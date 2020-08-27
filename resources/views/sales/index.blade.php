@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card ">

                    @include ('sales.salespersons')


                    <div class="accordion" id="accordionExample">

                        @can('isAdmin')
                            @include('sales.w2_bonuses')
                            @include('sales.1099_bonuses')
                        @endcan
                        @canany(['isAdmin', 'isSalesPerson'])
                            @include('sales.aged_receivables')
                            @include('sales.customer_statements')
                        @endcanany

                        @can('isAdmin')
                            @include('sales.margin_commissions')
                        @endcan
                    </div>
                </div>
                <div class="card-footer">
                    <p class="text-muted text-center">&copy;
                        @php
                            $copyYear = 2018; // Set your website start date
                            $curYear = date('Y'); // Keeps the second year updated
                            echo $copyYear . (($copyYear != $curYear) ? '-' . $curYear : '')
                        @endphp
                        Oz Distribution, Inc.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
