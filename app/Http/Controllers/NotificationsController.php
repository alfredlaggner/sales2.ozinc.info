<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Customer;
class NotificationsController extends Controller
{
    use Notifiable;
    public  function  view_notifications(){
        $customer = Customer::find(827);
        $customer_array=[];
        foreach ($customer->notifications as $notification) {
            $data = $notification->data;
            array_push($customer_array,$data);
        }
        dd($customer_array);
        return view('ar.emailed_staements',compact('customer_array'));
    }

    public function notify_customer(){

        $customers = Customer::where('total_due' ,'>', 100)->orderBy('name')->get();
        return view('ar.select_customer',compact('customers') );
    }
}
