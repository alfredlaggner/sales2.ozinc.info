<?php

namespace App\Http\Controllers;

use App\Imports\CustomersImport;
use App\EmployeeBonus;
use App\Exports\BonusExport;
use App\Payment;
use App\Salesline;
use App\SalesPerson;
use App\TmpBonusTotal;
use Carbon\Carbon;use DateTime;

use Edujugon\Laradoo\Odoo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeBonusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //test
        $month = $request->get('month');
        $year = $request->get('year');

        $button_value = $request->get('display');
        if ($button_value == "percents") {
            $this->bonus_init($request);
        }

        $sps = SalesPerson::where('is_ten_ninety', 0)
            ->where('sales_person_id', '<>', 110)
            ->where('sales_person_id', '<>', 111)
            ->get();
        $per_salesperson = [];
        foreach ($sps as $sp) {
            $payments = Payment::select('*', 'sales_persons.*')
                //   ->where('ext_id', 9414)
                ->where('year_paid', $year)
                ->leftJoin('sales_persons', 'payments.sales_person_id', '=', 'sales_persons.sales_person_id')
                ->where('month_paid', $month)
                //         ->where('invoice_state', 'paid')
                ->where('sales_persons.is_ten_ninety', false)
                ->whereNotNull('commission')
                ->orderBy('sales_persons.name')
                ->orderBy('invoice_date', 'desc')
                ->get();
            $totals = Payment::select(DB::raw('*,sales_persons.name as sales_persons_name,
                        sum(commission) as sp_commission,
                        sum(amount) as sp_amount
                        '))
                ->leftJoin('sales_persons', 'payments.sales_person_id', '=', 'sales_persons.sales_person_id')
                ->where('year_paid', $year)
                ->where('month_paid', $month)
                //       ->where('invoice_state', 'paid')
                ->where('sales_persons.is_ten_ninety', false)
                ->whereNotNull('commission')
                ->groupBy('payments.sales_person_id')
                ->get();

            $monthNum = $month;
            $dateObj = DateTime::createFromFormat('!m', $monthNum);
            $monthName = $dateObj->format('F');
            session(['year' => $year]);
            session(['month' => $month]);
            return view('commissions.bonus_accordion', compact('per_salesperson', 'payments', 'totals', 'sps', 'year', 'monthName'));

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function bonus_init(Request $request, $year = 0, $month = 0)
    {
        //   dd($year . ' ' . $month);
        if (!$year) {
            $month = $request->get('month');
            $year = $request->get('year');
        }
        /*        $month = 6;
                $year = 2020;*/
      //  dd(Carbon::now()->month - $month == 1);
        if (Carbon::now()->month - $month == 1) {
            $read_only = '';
            $submit = "submit";
        } else {
            $read_only = 'readonly';
            $submit = "button";
        }
        $monthNum  = $month;
        $dateObj   = DateTime::createFromFormat('!m', $monthNum);
        $month_name = $dateObj->format('F'); // March

        $bonuses = EmployeeBonus::where('year', $year)->where('month', $month)->whereIsTenNinety(false)->get();
        //    dd($bonuses);
        return view('commissions.bonus_init', compact('bonuses', 'year', 'month','month_name','read_only', 'submit'));
    }

    public function update(Request $request, EmployeeBonus $employeeBonus)
    {
        $month_paid = $request->get('month_paid');
        $year = $request->get('year');
        $month = $request->get('month');

        if ($month_paid) {
            $return_message = $this->set_paid($request);
        } else {
            $return_message = $this->set_percentage($request);
        }
        return redirect(route('bonus_init', ['year' => $year, 'month' => $month]))->with('status', $return_message);

    }

    private function set_paid($request)
    {
        $bonus_id = $request->get('bonus_id');
        $year = $request->get('year');
        $month = $request->get('month');

        for ($i = 0; $i < count($bonus_id); $i++) {
            $date = Carbon::now()->addDay(1)->toDateString();
            EmployeeBonus::find($bonus_id[$i])->update([
                'comm_paid_at' => $date,
            ]);

            $w2 = EmployeeBonus::where('id', intval($bonus_id[$i]))->first();

            Payment::where('sales_person_id', $w2->sales_person_id)
                ->where('month_paid', $month)
                ->where('year_paid', $year)
                ->update(['comm_paid_at' => $date]);

            $payments = Payment::where('sales_person_id', $w2->sales_person_id)
                ->where('month_paid', $month)
                ->where('year_paid', $year)
                ->get();

            foreach ($payments as $payment) {
                $this->write_to_odoo($payment);
            }
        }
        return "Month marked as paid";
    }

    private function set_percentage($request)
    {
        $year = $request->get('year');
        $month = $request->get('month');
        $percent = $request->get('percent');
        $bonus_id = $request->get('bonus_id');

        for ($i = 0; $i < count($percent); $i++) {
            $date = Carbon::now()->toDateString();
            EmployeeBonus::find($bonus_id[$i])->update([
                'bonus' => $percent[$i] / 100,
            ]);
        }

        $current_month = $month;
        $current_year = $year;

        $sps = SalesPerson::where('is_ten_ninety', false)->get();
        foreach ($sps as $sp) {
            EmployeeBonus::updateOrCreate(
                [
                    'sales_person_id' => $sp->sales_person_id,
                    'month' => $current_month,
                    'year' => $current_year
                ],
                [
                    'sales_person_name' => $sp->name,
                ]
            );
        }
        $payments = Payment::whereNotNull('invoice_date')
            ->where('month_paid', $current_month)
            ->where('year_paid', $current_year)
            ->get();
        foreach ($payments as $payment) {
            /*            $this->info($payment->sales_order);
                        $this->info($payment->sales_person_id);*/

            if ($payment->invoice_date >= env('BONUS_START')) {
                $bonus = EmployeeBonus::where('month', $payment->month_invoiced)
                    ->where('year', $payment->year_invoiced)
                    ->where('sales_person_id', $payment->sales_person_id)
                    ->first();


                if ($bonus) {
                    if ($bonus->bonus > 0) {
                        $bonus_percent = $bonus->bonus;
                    } else {
                        $bonus_percent = $bonus->base_bonus;
                    }


                    Payment::where('id', $payment->id)
                        ->update([
                            'comm_percent' => $bonus_percent,
                            'commission' => $bonus_percent * $payment->amount
                        ]);
                }
            } elseif ($payment->invoice_date < env('BONUS_START')) {
                if ($payment->sales_person_id != 73) {
                    $sales_line = Salesline::select(DB::raw('*,
                        sum(commission) as sum_commission'))
                        ->where('order_number', $payment->sales_order)
                        ->first();

                    Payment::where('id', $payment->id)
                        ->update([
                            'commission' => $sales_line->sum_commission
                        ]);

                } else {
                    // Ryan Cullerton
                    $sales_line = Salesline::select(DB::raw('*,
                        sum(amount) as sum_amount'))
                        ->where('order_number', $payment->sales_order)
                        ->first();

                    Payment::where('id', $payment->id)
                        ->update([
                            'commission' => $sales_line->sum_amount * 0.06
                        ]);
                }
            }
        }
        return "All bonuses updated";
    }

    private function write_to_odoo($payment)
    {
        $odoo = new Odoo();
        $odoo->username('alfred.laggner@gmail.com')
            ->password('jahai999')
            ->db('ozinc-production-elf-test-1367461')
            ->host('https://ozinc-production-elf-test-1367461.dev.odoo.com')
            ->connect();

        $odoo->where('id', $payment->invoice_id)
            ->update('account.invoice', [
                'x_studio_commission' => $payment->commission,
                'x_studio_commission_percent' => $payment->comm_percent * 100,
                'x_studio_commission_paid' => $payment->comm_paid_at,
            ]);
    }

    public
    function add_employee_month_bonus()
    {
        $current_month = (Carbon::now()->month);
        $current_year = (Carbon::now()->year);
        $sps = SalesPerson::where('is_ten_ninety', false)->get();
        foreach ($sps as $sp) {
            EmployeeBonus::updateOrCreate(
                [
                    'sales_person_id' => $sp->sales_person_id,
                    'month' => $current_month,
                    'year' => $current_year
                ],
                [
                    'sales_person_name' => $sp->name,
                ]
            );
        }
        $payments = Payment::whereNotNull('invoice_date')
            ->where('month_paid', $current_month)
            ->where('year_paid', $current_year)
            ->get();
        foreach ($payments as $payment) {
            /*            $this->info($payment->sales_order);
                        $this->info($payment->sales_person_id);*/

            if ($payment->invoice_date >= env('BONUS_START')) {
                $bonus = EmployeeBonus::where('month', $payment->month_invoiced)
                    ->where('year', $payment->year_invoiced)
                    ->where('sales_person_id', $payment->sales_person_id)
                    ->first();


                if ($bonus) {
                    if ($bonus->bonus > 0) {
                        $bonus_percent = $bonus->bonus;
                    } else {
                        $bonus_percent = $bonus->base_bonus;
                    }


                    Payment::where('id', $payment->id)
                        ->update([
                            'comm_percent' => $bonus_percent,
                            'commission' => $bonus_percent * $payment->amount
                        ]);
                }
            } elseif ($payment->invoice_date < env('BONUS_START')) {
                if ($payment->sales_person_id != 73) {
                    $sales_line = Salesline::select(DB::raw('*,
                        sum(commission) as sum_commission'))
                        ->where('order_number', $payment->sales_order)
                        ->first();

                    Payment::where('id', $payment->id)
                        ->update([
                            'commission' => $sales_line->sum_commission
                        ]);

                } else {
                    // Ryan Cullerton
                    $sales_line = Salesline::select(DB::raw('*,
                        sum(amount) as sum_amount'))
                        ->where('order_number', $payment->sales_order)
                        ->first();
                    $this->info($payment->sales_order);
                    $this->info($payment->invoice_date);
                    $this->info($sales_line->sum_amount);
                    $this->info($sales_line->sum_amount * 0.06);
                    Payment::where('id', $payment->id)
                        ->update([
                            'commission' => $sales_line->sum_amount * 0.06
                        ]);
                }
            }

        }
        return;
    }

    public
    function export_bonus(Request $request)
    {
        $year = Session::get('year');
        $month = Session::get('month');
        $excel_name = 'Bonus' . ' ' . $month . ' ' . $year . '.xlsx';
        return Excel::download(new BonusExport($year, $month), $excel_name);
    }

    public
    function importToCustomerImport()
    {
        DB::table('customer_imports')->delete();
        Excel::import(new CustomersImport, storage_path('customer_imports.xlsx'));
        return redirect(route('home'));


    }


}
