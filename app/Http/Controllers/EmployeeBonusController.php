<?php

namespace App\Http\Controllers;

use App\EmployeeBonus;
use App\Exports\BonusExport;
use App\Payment;
use App\SalesPerson;
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
                ->where('year_paid', $year)
                ->leftJoin('sales_persons', 'payments.sales_person_id', '=', 'sales_persons.sales_person_id')
                ->where('month_paid', $month)
                ->where('sales_persons.is_ten_ninety', false)
                ->whereNotNull('commission')
                ->orderBy('sales_persons.name')
                ->orderBy('invoice_date' ,'desc')
                ->get();

            $totals = Payment::select(DB::raw('*,sales_persons.name as sales_persons_name,
                        sum(commission) as sp_commission,
                        sum(amount) as sp_amount
                        '))
                ->leftJoin('sales_persons', 'payments.sales_person_id', '=', 'sales_persons.sales_person_id')
                ->where('year_paid', $year)
                ->where('month_paid', $month)
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
        $bonuses = EmployeeBonus::where('year', $year)->where('month', $month)->get();
        //    dd($bonuses);
        return view('commissions.bonus_init', compact('bonuses', 'year', 'month'));
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
        return redirect(route('bonus_init', ['year' => $year, 'month' => $month]))->with('status', "All bonuses updated.");
    }

    public function export_bonus(Request $request)
    {
        $year = Session::get('year');
        $month = Session::get('month');
        $excel_name = 'Bonus' . ' ' . $month . ' '. $year . '.xlsx';
        return Excel::download(new BonusExport($year, $month), $excel_name);
    }

    public function index_old(Request $request)
    {
        //      dd($request);
        $button_value = $request->get('display');
        if ($button_value == "percents") {
            $this->bonus_init($request);
        }

        // dd($request);
        //     dd($rep);
        //    $rep_id = $request->get('salesperson_id');
        $month = $request->get('month');
        $year = $request->get('year');
        /*        echo $month . ' ' . $year;
                dd("start");*/

        $payments = Payment::select('*', 'sales_persons.*')
            ->leftJoin('sales_persons', 'payments.sales_person_id', '=', 'sales_persons.sales_person_id')
            ->where('year_paid', $year)
            ->where('month_paid', $month)
            ->where('amount', '>', 1.00)
            ->where('sales_persons.is_ten_ninety', false)
            ->whereNotNull('commission')
//            ->limit(3)
            ->orderBy('sales_persons.name')
            ->orderBy('invoice_date')
            ->get();
        //  $payments = $q->where('payments.sales_person_id', $request->get('salesperson_id'))->get();
        //   dd($payments);


        $totals = Payment::select(DB::raw('*,sales_persons.name as sales_persons_name,
                        sum(commission) as sp_commission,
                        sum(amount) as sp_amount
                        '))
            ->leftJoin('sales_persons', 'payments.sales_person_id', '=', 'sales_persons.sales_person_id')
            ->where('year_paid', $year)
            ->where('month_paid', $month)
            ->where('amount', '>', 1.00)
            ->where('sales_persons.is_ten_ninety', false)
            ->whereNotNull('commission')
//            ->limit(3)
            ->groupBy('payments.sales_person_id')
            ->get();
//dd($totals->toArray());
        return view('commissions.bonus', compact('payments', 'totals', 'month', 'year'));

    }


}
