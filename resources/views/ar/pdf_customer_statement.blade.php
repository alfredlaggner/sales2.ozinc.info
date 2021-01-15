<style>
    table, th, td {
        border: 1px solid darkgrey;
        border-collapse: collapse;
    }

    th, td {
        padding: 5px;
        font-size: 12px;
        width: 100%;
    }

    .makebold {
        font-weight: bold;
    }
</style>

<img src="oz_letterhead.jpg" alt="Italian Trulli" style="width:97px;height:80px;">
<p>Dear {{$customer_name}},</p>
<p>This is a reminder that your account is currently past due. </p>
<p>Please be aware, if you've made a recent payment that is not reflected below, our AR processing period is 3-4
    business days.</p>
<p>Otherwise, if you have any questions or concerns, please call (831) 600-7194 or (831) 316-8538.</p>
<p>Thank you.</p>

<h5>{{$customer_name}} Account Statement as of {{date('Y-m-d')}}</h5>
<table style="table-layout: fixed; width: 100%" class="table table-bordered">
    <thead>
    <tr>
        <th class="text-xl-left">Invoice Date</th>
        <th class="text-xl-left">Due Date</th>
        <th class="text-xl-left" style="width: 130%;">Name</th>
        <th class="text-xl-left">Sales Order</th>
        <th class="text-xl-right">Debit $</th>
        <th class="text-xl-right">Credit $</th>
                <th class="text-xl-right">Paid on $</th>
    </tr>
    </thead>
    <tbody>

    <!--   <tr>
       <td></td>
        <td></td>
        <td>2019 Balance </td>
        <td></td>
        <td align="right">{{$pre_total_debit? number_format($pre_total_debit,2) : ''}}</td>
        <td align="right">{{$pre_total_credit ? number_format($pre_total_credit,2) : ''}}</td>
        <td align="right">{{$pre_year_balance ? number_format($pre_year_balance,2) : ''}}</td>
   </tr>
    -->
    @foreach($ledgers as $sl)
        <tr>
            <td class="text-xl-left">{{$sl['date']}}</td>
            <td class="text-xl-left">{{$sl['due']}}</td>
            <td class="text-xl-left">{{$sl['name']}}</td>
            <td class="text-xl-left">{{$sl['sales_order']}}</td>
            <td align="right">{{$sl['amount'] ? number_format($sl['amount'],2) : ''}}</td>
            <td align="right">{{$sl['payment_amount'] ? number_format($sl['payment_amount'],2) : ''}}</td>
            <td align="left">{{$sl['payment_date'] ? $sl['payment_date'] : ''}}</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr class="makebold">
        <td>Totals</td>
        <td></td>
        <td></td>
        <td></td>
        <td align="right">{{number_format($total_amount,2)}}</td>
        <td align="right">{{number_format($total_payment,2)}}</td>
        <td align="right">{{number_format($total_payment - $total_amount,2)}}</td>
    </tr>
    </tfoot>
</table>
