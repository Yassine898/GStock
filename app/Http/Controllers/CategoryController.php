<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categorys=Category::all();
        return view('productsByCat',compact('categorys'));
    }
}
