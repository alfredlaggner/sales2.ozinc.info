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
                    <div role="tabpanel" class="tab-pane fade in active mt-3" id="profile">@include('commissions.paid',['status' => 'unpaid'])</div>
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
