<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        return view('orders.index');
    }

    public function getCustomers(Request $request){
        $request->validate([
            'search'=>'required'
        ]);
        $searchterm=trim($request->search);
        $customers =Customer::where('first_name','Like',"%{$searchterm}%")->get();

        $request->flash();
        return view('orders.index',compact('customers'));
    }

    public function getOrders(Customer $customer){
        $orders = $customer->orders;
        return response()->json($orders);
    }
    public function getproducts(Order $order){
        $products = $order->products;
        return response()->json($products);
    }
}
