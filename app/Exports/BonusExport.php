<?php

namespace App\Exports;

use App\Payment;
use App\SalesPerson;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

class BonusExport implements FromView
{
    public function __construct($year, $month)
    {
        $this->year = $year;
        $this->month = $month;
    }

    public function view(): View
    {
        $payments = Payment::select('*', 'sales_persons.*')
            ->where('year_paid', $this->year)
            ->where('month_paid', $this->month)
            ->leftJoin('sales_persons', 'payments.sales_person_id', '=', 'sales_persons.sales_person_id')
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
            ->where('year_paid', $this->year)
            ->where('month_paid', $this->month)
            ->where('sales_persons.is_ten_ninety', false)
            ->whereNotNull('commission')
  //          ->where('invoice_state', 'paid')
            ->groupBy('payments.sales_person_id')
            ->get();

        $sps = SalesPerson::whereIsTenNinety(false)->get();

        return view('exports.bonus',
            [
                'sps' => $sps,
                'payments' => $payments,
                'totals' => $totals,
                'year' => $this->year,
                'month' => $this->month,
            ]
        );
    }
}
