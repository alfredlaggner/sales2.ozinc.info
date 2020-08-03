@extends('layouts.app')
@section('title', 'commissions Report')
@php
    $i=1;
@endphp
@section('content')
    <div class="container-fluid" style="width: 70%;">
        <div class="card" style="width: 100%; text-align: center">
            <div class="card-header">
                <h4>{{$name}}</h4>
                <h5>Collected Invoices</h5>
            </div>
            <div class="card-body">

                @php
                    $i = 1;
                @endphp

                <div class="accordion" id="bonus_per_month">
                    @foreach($totals as $total)
                        @php
                            $disp_month = date("F", mktime(0, 0, 0, substr($total->summary_year_month, 4, 2), 1));
                            $disp_year = substr($total->payment_date, 0, 4);
                        @endphp
                        <div class="card">
                            <div class="card-header" id="heading_{{$i}}">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapse_{{$i}}" aria-expanded="false"
                                            aria-controls="collapse_{{$i}}">
                                        <table class="table table-bordered" style=" table-layout: fixed ; width: 100% ;">
                                            <tablebody>
                                                <tr>
                                                    <td>{{$disp_month}} {{$disp_year}}</td>
                                                    <td>{{$total->sp_amount}}</td>
                                                    <td>{{$total->sp_commission}}</td>
                                                </tr>
                                            </tablebody>
                                        </table>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse_{{$i}}" class="collapse" aria-labelledby="heading_{{$i}}"
                                 data-parent="#bonus_per_month">
                                <div class="card-body">
                                    <table class="table table-bordered" style=" table-layout: fixed ; width: 100% ;">
                                        <tableheader>
                                            <tr>
                                                <th>Sales Order</th>
                                                <th>Invoice</th>
                                                <th>Date</th>
                                                <th>Amount</th>
                                                <th>Commission</th>
                                            </tr>
                                        </tableheader>
                                        <tablebody>
                                            @php
                                                $payment_per_month = $payments->where('month_paid',$total->month_paid);
                                            @endphp
                                            @foreach($payment_per_month as $payment)
                                                <tr>
                                                    <td>{{$payment->display_name}}</td>
                                                    <td>{{$payment->sales_order}}</td>
                                                    <td>{{$payment->invoice_date}}</td>
                                                    <td>{{$payment->amount}}</td>
                                                    <td>{{$payment->commission}}</td>
                                                </tr>
                                            @endforeach
                                        </tablebody>
                                    </table>

                                </div>
                            </div>
                        </div>
                        @php
                            $i++;
                        @endphp

                    @endforeach
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Month</th>
                        {{--
                                                <th scope="col">Commission</th>
                        --}}
                        <th scope="col">Paid at</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for ($k =0; $k < count($months); $k++)
                        <tr>
                            @php
                                $paid_month=$months[$k]['month_name'];
                                $paid_year=$months[$k]['year'];
                                $paid_date=str_replace("_", "-", substr($months[$k]['name'],14,10));
                            @endphp
                            <td>{{$paid_month}}  {{$paid_year}}</td>
                            <td> {{$paid_date}}</td>
                            <td><a class="btn btn-primary active" role="button" aria-pressed="true"
                                   href="{{ route ('paid_out',['table_name' => $months[$k]['name'],'rep' => $months[$k]['rep'],'description' => $paid_date])}}">Details
                                </a>
                            </td>
                        </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <h5>Uncollected Invoices</h5>
                {{--
                                <ul class="nav nav-tabs nav-fill">
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                                       aria-controls="pills-profile" aria-selected="true">Uncollected Invoices</a>
                                </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        @include('commissions.paid',['status' => 'unpaid'])
                                    </div>
                                </div>
                --}}

                <ul class="nav nav-pills justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" href="#profile" role="tab" data-toggle="tab">Open</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#buzz" role="tab" data-toggle="tab">Close</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active mt-3"
                         id="profile">@include('commissions.paid',['status' => 'unpaid'])</div>
                    <div role="tabpanel" class="tab-pane fade mt-3" id="buzz">Click 'Open' to display</div>
                </div>
            </div>
        </div>

    </div>
    {{--
        <div class="container">
            <h3>{{$name}}</h3>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item  dropdown show">
                    <a class="nav-link active dropdown-toggle" id="pills-profile-tab" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false"
                       href="#">Paid Commissions</a>
                    <div class="dropdown-menu show" role="menu">
                        @for ($k =0; $k < count($months); $k++)
                            @php
                                $paid_month=$months[$k]['month_name'];
                                $paid_year=$months[$k]['year'];

                                $paid_date=str_replace("_", "-", substr($months[$k]['name'],14,10));

                            @endphp
                            <a class="dropdown-item"
                               href="{{ route ('paid_out',['month' => $months[$k]['name'],'rep' => $months[$k]['rep'],'description' => $paid_date])}}">
                                <b>{{$paid_month}}  {{$paid_year}}</b>
                            </a>
                        @endfor
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                       aria-controls="pills-profile" aria-selected="true">Uncollected Invoices</a>
                </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    @include('commissions.paid',['status' => 'unpaid'])
                </div>
            </div>
        </div>
    --}}
@endsection
