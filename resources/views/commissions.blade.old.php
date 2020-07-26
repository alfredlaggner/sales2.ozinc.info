@extends('layouts.app')
@section('title', 'Commissions Report')
@section('content')
    <style>
        .btn-link {
            font-weight: 400;
            color: red;
            background-color: transparent;
        }

        .btn-link:hover {
            text-decoration: none;
            color: darkmagenta;
        }

        .makebold {
            font-weight: bold;
        }

    </style>
    <div class="container" style="width:150%">
        <div class="row">
            <div class="col">
                <h4>{{$salesorderItems[0]['salesperson_name']}}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-bordered table-sm products" width="600px">
                    <tr>
                        <td>Month</td>
                        <td><b>{{$salesorderItems[0]['dMonth']}}</b></td>
                        <td>{{$salesorderItems[1]['dMonth']}}</td>
                        <td>{{$salesorderItems[2]['dMonth']}}</td>
                    </tr>
                    <tr>
                        <td>Number of Salesorders:</td>
                        <td><b>{{$salesorderItems[0]['salesorder_count']}}</b></td>
                        <td>{{$salesorderItems[1]['salesorder_count']}}</td>
                        <td>{{$salesorderItems[2]['salesorder_count']}}</td>
                    </tr>

                    <tr>
                        <td>Sales:</td>
                        <td><span
                                    style="color:deeppink "><b>{{$lineItems[0]['total_sales']}}</b></span></td>
                        <td><span
                                    style="color:deeppink ">{{$lineItems[1]['total_sales']}}</span></td>
                        <td><span
                                    style="color:deeppink ">{{$lineItems[2]['total_sales']}}</span></td>
                    </tr>
                    <tr>
                        <td>Commission:</td>
                        <td><span
                                    style="color:deeppink"><b>{{$lineItems[0]['total_commission']}}</b></span></td>
                        <td><span
                                    style="color:deeppink">{{$lineItems[1]['total_commission']}}</span></td>
                        <td><span
                                    style="color:deeppink">{{$lineItems[2]['total_commission']}}</span></td>
                    </tr>
                    {{--
                                        <tr>
                                            <td>Avg Margin:</td>
                                            <td><span
                                                        style="color:deeppink"><b>{{$salesorderItems[0]['margin_average']}}</b></span></td>
                                            <td><span
                                                        style="color:deeppink"><b>{{$salesorderItems[1]['margin_average']}}</b></span></td>
                                            <td><span
                                                        style="color:deeppink"><b>{{$salesorderItems[2]['margin_average']}}</b></span></td>
                                        </tr>
                    --}}
                </table>
            </div>
        </div>
        <div id=myGroup>
            <div class="row  justify-content-between" style="margin-bottom: 1em">
                <div class="col">
                    <a class="btn btn-success" data-toggle="collapse" href="#collapseExample" role="button"
                       aria-expanded="false" aria-controls="collapseExample">
                        View by Salesorder
                    </a>
                </div>

                <div class="col">
                    <button id="viewCustomers" class="btn btn-success" type="button" data-toggle="collapse"
                            href="#collapseExample2"
                            aria-expanded="false" aria-controls="collapseExample2">
                        View by Customer
                    </button>
                </div>

                <div class="col">
                    <button class="btn btn-success" type="button" data-toggle="collapse"
                            href="#collapseExample3"
                            aria-expanded="false" aria-controls="collapseExample3">
                        View by Brand
                    </button>
                </div>

                <div class="col">
                    <button class="btn btn-success" type="button" data-toggle="collapse"
                            href="#collapseExample4"
                            aria-expanded="false" aria-controls="collapseExample4">
                        View by Year to Date
                    </button>
                </div>
                <div class="col">
                    <a href="{{ route('go-home') }}" class="btn btn-primary float-right" role="button"
                       aria-pressed="true">Home</a>
                </div>
            </div>
            <div class="collapse show" id="collapseExample" data-parent="#myGroup">
                <div class="card card-body">
                    <div id="accordion" class="accordion">
                        @php $i = 1; @endphp
                        @foreach ($so_items as $so_item)
                            @php
                                if($so_item->invoice_state == "paid") {$is_paid_color = 'color:green;font-weight:bold';}
                                  else{
                                  $is_paid_color = 'color:midnightblue;';
                                  }
                            @endphp
                            <div class="card">
                                <div class="card-header bg-light" id="headingOne{{$i}}">
                                    <h6 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse"
                                                data-target="#collapseOne{{$i}}"
                                                aria-expanded="true" aria-controls="collapseOne{{$i}}">
                                            <div class="row">
                                                <div class="col"><span
                                                            style="{{$is_paid_color}}">{{substr($so_item->customer_name,0,30)}}</span>
                                                </div>

                                                <div class="col"><span
                                                            style="color:midnightblue;">{{$so_item->invoice_number}}</span>
                                                </div>

                                                <div class="col"><span
                                                            style="color:midnightblue;">{{$so_item->order_date}}</span>
                                                </div>

                                                <div class="col"> Sales: <span
                                                            style="color:midnightblue;font-weight: bold">${{number_format($so_item->order_total,2,',','.')}}</span>
                                                </div>
                                                <div class="col"> Commission: <span
                                                            style="color:midnightblue;font-weight: bold">${{number_format($so_item->order_commission,2),',','.'}}</span>
                                                </div>

                                                <div class="col"><span
                                                            style="color:midnightblue;">{{$so_item->invoice_state}}</span>
                                                </div>

                                                {{--
                                                                                                <div class="col"> Avg Margin: <span
                                                                                                            style="color:midnightblue;font-weight: bold">{{number_format($so_item->margin_average,2)}}%</span>
                                                                                                </div>
                                                --}}

                                            </div>
                                        </button>
                                    </h6>
                                </div>

                                <div id="collapseOne{{$i}}" class="collapse" aria-labelledby="headingOne{{$i}}"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                        <table class="table table-bordered table-hover table-sm table-responsive-sm">
                                            <thead>
                                            <tr>
                                                <th>Sku</th>
                                                <th>Name</th>
                                                <th class="text-xl-right">Cost</th>
                                                <th class="text-xl-right">Price</th>
                                                <th class="text-xl-right">Qty</th>
                                                <th class="text-xl-right">Subtotal</th>
                                                <th class="text-xl-right">Margin %</th>
                                                <th class="text-xl-right">Comm %</th>
                                                <th class="text-xl-right">Comm $</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $ols = $items->where('invoice_number','=',$so_item->invoice_number);
                                            @endphp
                                            @foreach ($ols as $sl)
                                                <tr>
                                                    <td>{{str_replace ( ['[',']'] , '' ,$sl->code)}}</td>
                                                    <td>{{substr($sl->name,0,80)}}</td>
                                                    <td class="text-xl-right">{{number_format($sl->cost,2)}}</td>
                                                    <td class="text-xl-right">{{number_format($sl->unit_price,2)}}</td>
                                                    <td class="text-xl-right">{{$sl->qty_invoiced}}</td>
                                                    <td class="text-xl-right">{{number_format($sl->price_subtotal,2)}}</td>
                                                    <td class="text-xl-right">{{number_format($sl->margin,2)}}</td>
                                                    <td class="text-xl-right">{{number_format($sl->comm_percent * 100,2)}}</td>
                                                    <td class="text-xl-right">{{number_format($sl->commission,2)}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @php $i++;@endphp
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="collapse" id="collapseExample2" data-parent="#myGroup">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-xl-6">
                            <div id="poll_div_0">
                            </div>
                            <?= Lava::render('BarChart', 'Customer0', 'poll_div_0') ?>
                            <table id="accounts" class="table table-bordered table-hover table-sm">
                                <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th class="text-xl-right">Sales $</th>
                                    <th class="text-xl-right">Comm $</th>
                                    {{--
                                                                        <th class="text-xl-right">Avg. Margin</th>
                                    --}}
                                    <th class="text-xl-right"># SO</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $customers = $customerItems[0]['customers']; @endphp
                                @foreach ($customers as $sl)

                                    <!-- Button trigger modal -->
                                    <tr data-toggle="popover" data-trigger="focus" title="Click to see sales per brand"
                                        style="cursor: pointer"
                                        href="{{route('donutchart',['customer_id' => $sl->customer_id,'customer_name' => $sl->customer_name,'salesperson' => $data['salesperson_id'],'month' => $data['month']])}}"
                                        class="me">
                                        <td>{{$sl->customer_name}}</td>
                                        <td class="text-xl-right">{{number_format($sl->customer_volume,2)}}</td>
                                        <td class="text-xl-right">{{number_format($sl->customer_commission,2)}}</td>
                                        {{--
                                                                                <td class="text-xl-right">{{number_format($sl->customer_margin,2)}}</td>
                                        --}}
                                        <td class="text-xl-right">{{$sl->customer_count}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfooter>
                                    <td><b>Total Sales</b></td>
                                    <td class="text-xl-right">
                                        <b>{{number_format($customerItems[0]['salesTotal'],2)}}</b></td>
                                    <td class="text-xl-right">
                                        <b>{{number_format($customerItems[0]['commissionTotal'],2)}}</b></td>
                                    {{--
                                                                        <td class="text-xl-right">
                                                                            <b>{{number_format($customerItems[0]['averageMarginTotal'],2)}}</b></td>
                                                                        <td></td>
                                    --}}
                                </tfooter>
                            </table>
                        </div>
                        <div class="col-xl-6">
                            <div id="poll_div1">
                            </div>
                            <?= Lava::render('BarChart', 'Customer1', 'poll_div1') ?>

                            <table id="accounts" class="table table-bordered table-hover table-sm">
                                <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th class="text-xl-right">Sales $</th>
                                    <th class="text-xl-right">Comm $</th>
                                    {{--
                                                                        <th class="text-xl-right">Avg. Margin</th>
                                    --}}
                                    <th class="text-xl-right"># SO</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $customers = $customerItems[1]['customers'] @endphp
                                @foreach ($customers as $sl)
                                    <!-- Button trigger modal -->
                                    <tr data-toggle="popover" data-trigger="focus" title="Click to see sales per brand"
                                        style="cursor: pointer"
                                        href="{{route('donutchart',['customer_id' => $sl->customer_id,'customer_name' => $sl->customer_name,'salesperson' => $data['salesperson_id'],'month' => $data['month']])}}"
                                        class="me">
                                        <td>{{$sl->customer_name}}</td>
                                        <td class="text-xl-right">{{number_format($sl->customer_volume,2)}}</td>
                                        <td class="text-xl-right">{{number_format($sl->customer_commission,2)}}</td>
                                        {{--
                                                                                <td class="text-xl-right">{{number_format($sl->customer_margin,2)}}</td>
                                        --}}
                                        <td class="text-xl-right">{{$sl->customer_count}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfooter>
                                    <td><b>Total Sales</b></td>
                                    <td class="text-xl-right">
                                        <b>{{number_format($customerItems[1]['salesTotal'],2)}}</b></td>
                                    <td class="text-xl-right">
                                        <b>{{number_format($customerItems[1]['commissionTotal'],2)}}</b></td>
                                    {{--
                                                                        <td class="text-xl-right">
                                                                            <b>{{number_format($customerItems[1]['averageMarginTotal'],2)}}</b></td>
                                                                        <td></td>
                                    --}}
                                </tfooter>

                            </table>


                        </div>
                    </div>
                </div>
            </div>
            <div class="collapse" id="collapseExample3" data-parent="#myGroup">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-xl-6">
                            <div id="brand_div0"></div>
                            <?= Lava::render('BarChart', 'Brand0', 'brand_div0') ?>
                            <?= Lava::render('BarChart', 'Brand1', 'brand_div1') ?>

                            <table id="brands0" class="table table-bordered table-hover table-sm table-responsive-sm">
                                <thead>
                                <tr>
                                    <th>Brand</th>
                                    <th class="text-xl-right">Sales $</th>
                                    <th class="text-xl-right">Comm $</th>
                                    {{--
                                                                    <th class="text-xl-right">Avg. Margin</th>
                                    --}}
                                    <th class="text-xl-right">SKUs</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $brands = $brandItems[0]['brands']; @endphp
                                @foreach($brands as $sl)
                                    <tr>
                                        <td>{{$sl->brand_name}}</td>
                                        <td class="text-xl-right">{{number_format($sl->brand_volume,2)}}</td>
                                        <td class="text-xl-right">{{number_format($sl->brand_commission,2)}}</td>
                                        {{--
                                                                            <td class="text-xl-right">{{number_format($sl->brand_margin,2)}}</td>
                                        --}}
                                        <td class="text-xl-right">{{$sl->brand_count}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <td><b>Total Sales</b></td>
                                <td class="text-xl-right"><b>{{number_format($brandItems[0]['salesTotal'],2)}}</b></td>
                                <td class="text-xl-right"><b>{{number_format($brandItems[0]['commissionTotal'],2)}}</b>
                                </td>
                                {{--
                                                            <td class="text-xl-right"><b>{{number_format($brandItems[0]['averageMarginTotal'],2)}}</b>
                                --}}
                                </td>
                                <td></td>
                                </tfoot>
                            </table>

                        </div>
                        <div class="col-xl-6">
                            <div id="brand_div1"></div>


                            <table id="brands1" class="table table-bordered table-hover table-sm table-responsive-sm">
                                <thead>
                                <tr>
                                    <th>Brand</th>
                                    <th class="text-xl-right">Sales $</th>
                                    <th class="text-xl-right">Comm$</th>
                                    {{--
                                                                    <th class="text-xl-right">Avg. Margin</th>
                                    --}}
                                    <th class="text-xl-right">SKUs</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $brands = $brandItems[1]['brands']; @endphp
                                @foreach($brands as $sl)
                                    <tr>
                                        <td>{{$sl->brand_name}}</td>
                                        <td class="text-xl-right">{{number_format($sl->brand_volume,2)}}</td>
                                        <td class="text-xl-right">{{number_format($sl->brand_commission,2)}}</td>
                                        {{--
                                                                            <td class="text-xl-right">{{number_format($sl->brand_margin,2)}}</td>
                                        --}}
                                        <td class="text-xl-right">{{$sl->brand_count}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <td><b>Total Sales</b></td>
                                <td class="text-xl-right"><b>{{number_format($brandItems[1]['salesTotal'],2)}}</b></td>
                                <td class="text-xl-right"><b>{{number_format($brandItems[1]['commissionTotal'],2)}}</b>
                                </td>
                                {{--
                                                            <td class="text-xl-right"><b>{{number_format($brandItems[1]['averageMarginTotal'],2)}}</b>
                                --}}
                                </td>
                                <td></td>
                                </tfoot>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
            <div class="collapse" id="collapseExample4" data-parent="#myGroup">
                <div class="card card-body">
                    <div id="month_div1">
                        <?= Lava::render('ColumnChart', 'Months', 'month_div1') ?>
                    </div>
                    <table id="accounts" class="table table-bordered table-hover table-sm">
                        <thead>
                        <tr>
                            <th>Month</th>
                            <th class="text-xl-right">Sales $</th>
                            <th class="text-xl-right">Comm $</th>
                            {{--
                                                    <th class="text-xl-right">Avg. Margin</th>
                            --}}
                            <th class="text-xl-right">Sold #</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($monthItems as $sl)
                            <tr class="makebold">
                                <td>{{ date("F", mktime(0, 0, 0, $sl->month, 1)) }} {{$sl->year}} </td>
                                <td class="text-xl-right">{{number_format($sl->month_sale,2)}}</td>
                                <td class="text-xl-right">{{number_format($sl->month_commission,2)}}</td>
                                {{--
                                                            <td class="text-xl-right">{{number_format($sl->month_margin,2)}}</td>
                                --}}
                                <td class="text-xl-right">{{$sl->month_sold}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <script>

        $(document).ready(function () {
            $('table tr').click(function () {
                window.location = $(this).attr('href');
                return false;
            });
        })

    </script>

@endsection
