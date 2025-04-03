<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Stock;
use App\Models\Store;
use App\Models\Supplier;

class ProductController extends Controller
{
    public function index(){
        $products=Product::with(['Category','Supplier'])->get();

        return view('products',compact('products'));
    }

    public function Products_By_Cat(Category $category){
        $products=Product::with(['category','supplier'])->where('category_id',$category->id)->get();
        return view('productsDataByCat',compact('products'));
    }

    public function bysupplier(Supplier $supplier){

        $products=Product::with(['category'])->where('supplier_id',$supplier->id)->get();

        return response()->json(compact('products'));
    }

    public function byStore(Store $store){
        $products = Product::with(['category', 'stock'])
        ->whereHas('stock', function($query) use ($store) {
            $query->where('store_id', $store->id);
        })
        ->get();
        var_dump($products);
    return response()->json(compact('products'));
    }
}
