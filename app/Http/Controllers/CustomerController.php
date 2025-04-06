<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers=Customer::all();
        return view('clients',compact('customers'));
    }
    public function AddForm(){
        return view('customer.add');
    }
    public function store(Request $request){
        
            $request->validate([
                'firstName'=>'required|string|max:255|min:5',
                'lastName'=>'required|string|max:255|min:5',
                'email'=>'required|email|unique:customers,email|max:255',
                'phone'=>'required|string|max:20|min:10',
                'address'=>'required|string'
            ]);
            $request->flash();
            
                Customer::create([
                    'first_name'=>$request->firstName,
                    'last_name'=>$request->lastName??null,
                    'email'=>$request->email,
                    'address'=>$request->address,
                    'phone'=>$request->phone
                ]);
            
                $customers=Customer::all();
            
                return redirect('/clients')->with('success','Customer added successfully!');
            
    }

    public function GetEditPage(Customer $customer){
            $customer=Customer::find($customer->id);
            return view('customer.edit',compact('customer'));
    }

    public function edit(Request $request,$id){
        $request->validate([
            'firstName'=>'required|string|max:255|min:5',
            'lastName'=>'required|string|max:255|min:5',
            'email'=>'required|email|max:255',
            'phone'=>'required|string|max:20|min:10',
            'address'=>'required|string'
        ]);
        $request->flash();
        $customer = Customer::findOrFail($id);
        $customer->update([
                    'first_name'=>$request->firstName,
                    'last_name'=>$request->lastName??null,
                    'email'=>$request->email,
                    'address'=>$request->address,
                    'phone'=>$request->phone
        ]);
        $customers=Customer::all();
        return redirect('/clients')->with('success','Customer updated successfully!');

    }

    public function getDeletePage($customer){
        return view('customer.delete',['id'=>$customer]);
    }

    public function delete(Customer $customer){
        $customer = Customer::findOrFail($customer->id);
        $customer->delete();
        return redirect('/clients')->with('success','customer deleted successfully');
    }
}
