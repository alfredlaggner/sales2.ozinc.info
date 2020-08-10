<?php

namespace App\Http\Controllers;

use App\Imports\CustomersImport;
use App\EmployeeBonus;
use App\Exports\BonusExport;
use App\Payment;
use App\Salesline;
use App\SalesPerson;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
     * @return \Illuminate\Http\Response
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

        $sps = SalesPerson::where('is_ten_ninety', 0)->get();
        $per_salesperson = [];
        foreach ($sps as $sp) {

            $payments = Payment::select('*', 'sales_persons.*')
             //   ->where('ext_id', 9414)
                ->where('year_paid', $year)
                ->leftJoin('sales_persons', 'payments.sales_person_id', '=', 'sales_persons.sales_person_id')
                ->where('month_paid', $month)
                ->where('invoice_state','paid')
                ->where('sales_persons.is_ten_ninety', false)
                ->whereNotNull('commission')
                ->orderBy('sales_persons.name')
                ->orderBy('invoice_date', 'desc')
                ->get();
//dd($payments->count());
            $totals = Payment::select(DB::raw('*,sales_persons.name as sales_persons_name,
                        sum(commission) as sp_commission,
                        sum(amount) as sp_amount
                        '))
                ->leftJoin('sales_persons', 'payments.sales_person_id', '=', 'sales_persons.sales_person_id')
                ->where('year_paid', $year)
                ->where('month_paid', $month)
                ->where('invoice_state','paid')
                ->where('sales_persons.is_ten_ninety', false)
                ->whereNotNull('commission')
                ->groupBy('payments.sales_person_id')
                ->get();
            $monthNum = $month;
            $dateObj = \DateTime::createFromFormat('!m', $monthNum);
            $monthName = $dateObj->format('F');
            session(['year' => $year]);
            session(['month' => $month]);
            return view('commissions.bonus_accordion', compact('per_salesperson', 'payments', 'totals', 'sps', 'year', 'monthName'));

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
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
        if (Carbon::now()->month - $month == 1) {
            $read_only = '';
            $submit = "submit";
        } else {
            $read_only = 'readonly';
            $submit = "button";
        }


        $bonuses = EmployeeBonus::where('year', $year)->where('month', $month)->whereNotNull('base_bonus')->get();
        //    dd($bonuses);
        return view('commissions.bonus_init', compact('bonuses', 'year', 'month', 'read_only', 'submit'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\EmployeeBonus $employeeBonus
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeBonus $employeeBonus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\EmployeeBonus $employeeBonus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeBonus $employeeBonus)
    {
        // dd($request);
        $year = $request->get('year');
        $month = $request->get('month');
        $percent = $request->get('percent');
        $bonus_id = $request->get('bonus_id');

        for ($i = 0; $i < count($percent); $i++) {
            EmployeeBonus::find($bonus_id[$i])->update(['bonus' => $percent[$i] / 100]);
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


        return redirect(route('bonus_init', ['year' => $year, 'month' => $month]))->with('status', "All bonuses updated.");
    }

    public function add_employee_month_bonus()
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

    public function export_bonus(Request $request)
    {
        $year = Session::get('year');
        $month = Session::get('month');
        $excel_name = 'Bonus' . ' ' . $month . ' ' . $year . '.xlsx';
        return Excel::download(new BonusExport($year, $month), $excel_name);
    }

    public function importToCustomerImport()
    {
        DB::table('customer_imports')->delete();
        Excel::import(new CustomersImport, storage_path('customer_imports.xlsx'));
        return redirect(route('home'));


    }


}
