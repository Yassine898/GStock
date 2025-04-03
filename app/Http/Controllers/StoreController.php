<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function stores(){
        $stores=Store::all();
        return view('productsByStore',compact('stores'));
    }
}
