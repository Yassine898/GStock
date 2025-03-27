<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(){
        $suppliers = Supplier::all();

        return view('suppliers',compact('suppliers'));
    }

    public function products(){
        $suppliers=Supplier::all();
        return view('suppliers.products-by-supplier',compact('suppliers'));
    }
}
