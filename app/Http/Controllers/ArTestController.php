<?php
/**
 *
 * @mixin Eloquent
 */

namespace App\Http\Controllers;

use App\Payment;
use PDF;
use Gate;
use Auth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use App\AgedReceivable;
use App\AgedReceivablesTotal;
use App\Exports\AgedReceivableDetailExport;
use App\Exports\AgedReceivableTotalExport;
use App\Exports\InvoiceNoteExport;
use App\Invoice;
use App\InvoiceAmountCollect;
use App\InvoiceNote;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Redis;

class ArTestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function xyz()
    {
        dd("xyz");
    }

    public function new_aged_receivables($rep_id=0, Request $request)
    {
     //   dd("here");
        /*        Artisan::call('tntsearch:import', ['model' => 'App\AgedReceivable']);
                Artisan::call('tntsearch:import', ['model' => 'App\AgedReceivablesTotal']);*/

        $data = [];
        if (!$rep_id) {
            $rep_id = $request->get('rep_id');
        }

        $customer = $request->get('customer');

        session(['rep_id' => $rep_id]);

        if ($rep_id) {

            $ars = AgedReceivable::
            when($rep_id, function ($query, $rep_id) {
                return $query->where('rep_id', $rep_id);
            })
                ->orderBy('customer')
                ->get();
            if ($customer) {
                if ($value = Redis::get('ars_totals1.all')) {
                    $ars_totals = collect(json_decode($value));
                } else {
                    $ars_totals = AgedReceivablesTotal::search($customer)->where('rep_id', $rep_id)->get();
                    //       Redis::set('ars_totals1.all', $ars_totals);
                }
                session(['search_value' => '$customer']);
            } else {
                if ($value = Redis::get('ars_totals2.all')) {
                    $ars_totals = collect(json_decode($value));
                } else {
                    $ars_totals = AgedReceivablesTotal::
                    when($rep_id, function ($query, $rep_id) {
                        return $query->where('rep_id', $rep_id);
                    })->orderBy('customer')->get();
                    //          Redis::set('ars_totals2.all', $ars_totals);
                }

                session(['search_value' => $rep_id]);

                //   dd($ars_totals);
            }
        } else {
            if ($customer) {
                if ($value = Redis::get('ars_totals3.all')) {
                    $ars_totals = collect(json_decode($value));
                } else {
                    $ars_totals = AgedReceivablesTotal::search($customer)->get();
                    session(['search_value' => $customer]);
                    //            Redis::set('ars_totals3.all', $ars_totals);
                }
            } else {
                if ($value = Redis::get('ars_totals4.all')) {
                    $ars_totals = collect(json_decode($value));
                } else {

                    $ars_totals = AgedReceivablesTotal::orderBy('customer')->get();
                    //           Redis::set('ars_totals4.all', $ars_totals);
                    session(['search_value' => '']);
                }
            }
            if ($value = Redis::get('ars.all')) {
                $ars = collect(json_decode($value));

            } else {
                $ars = AgedReceivable::orderBy('customer')->get();
                //       Redis::set('ars.all', $ars);
            }
        }

        $amt_collects = InvoiceAmountCollect::orderBy('updated_at', 'desc')->get();
        $notes = InvoiceNote::orderBy('updated_at', 'desc')->get();

//		$request->session()->forget('previous_screen'); // to start clean when adding notes

        return (view('ar.accordion', compact('ars', 'ars_totals', 'notes', 'amt_collects', 'rep_id')));
    }
}
