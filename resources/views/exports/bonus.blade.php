<div class="container">
    <h5 class="card-title">Bonuses</h5>
    <h6 class="card-subtitle mb-2 text-muted">{{$month}} {{$year}}</h6>
</div>
<div class="card-body">
    @foreach ($sps as $sp)
        <div class="card">
            <div class="card-header">
                <table>
                    <thead>
                    <tr>
                        <th class="text-xl-left">Salesperson</th>
                        <th class="text-xl-right">Total Sales</th>
                        <th class="text-xl-right">Total Commission</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $sp_totals = $totals->where('sales_person_id', $sp->sales_person_id);
                    @endphp
                    @foreach($sp_totals as $total)
                        <tr>
                            <td class="text-xl-left">
                                <b>{{$sp->name}}</b></td>
                            <td class="text-xl-right">{{number_format($total->sp_amount,2)}}</td>
                            <td class="text-xl-right">{{number_format($total->sp_commission,2)}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-body">
                <table>
                    <thead>
                    <tr>
                        <th class="text-xl-left">Salesorder</th>
                        <th class="text-xl-left">Invoiced at</th>
                        <th class="text-xl-right">Amount paid</th>
                        <th class="text-xl-right">Bonus</th>
                        <th class="text-xl-right">Commission</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $sp_payments = $payments->where('sales_person_id', $sp->sales_person_id);
                    @endphp

                    @foreach($sp_payments as $payment)
                        @php
                            if ($payment->invoice_date >= env('BONUS_START'))
                             {
                                  $bonus = number_format($payment->comm_percent*100,2) . "%";
                             }
                             else
                                 {
                                      if ($payment->sales_person_id == 73)
                                      {
                                          $bonus = '6%';
                                      } else {
                                          $bonus = 'C';
                                      }
                                 }
                        @endphp
                        <tr>
                            <td class="text-xl-left">{{$payment->sales_order}}</td>
                            <td class="text-xl-left">{{$payment->invoice_date}}</td>
                            <td class="text-xl-right">{{number_format($payment->amount,2)}}</td>
                            <td class="text-xl-right">{{$bonus}}</td>
                            <td class="text-xl-right">{{number_format($payment->commission,2)}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
</div>

