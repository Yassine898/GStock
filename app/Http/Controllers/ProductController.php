<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Store;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;



class ProductController extends Controller
{
    public function index(){
        $products=Product::with(['Category','Supplier'])->get();
        $categories = Category::all();
        $suppliers=Supplier::all();
        return view('products',compact('products','categories','suppliers'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required|min:4|string',
                'description'=>'required|string|min:5',
                'price'=>'required',
                'category_id'=>'required',
                'supplier_id'=>'required'
        ]);
        $request->flash();
            if($validator->fails()){
                return redirect('/products')->withErrors($validator,'add_product');
            }
            
            Product::create($request->all());
            return redirect('/products')->with('success','Product added successfully');
    }

    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:4|string',
            'description' => 'required|string|min:5',
            'price' => 'required|numeric|min:0', // Ensure price is numeric and non-negative
            'category_id' => 'required|exists:categories,id', // Validate category_id exists in categories table
            'supplier_id' => 'required|exists:suppliers,id',  // Validate supplier_id exists in suppliers table
        ]);
    
        if ($validator->fails()) {
            $request->flash(); // Flash the input to the session
            return redirect('/products')
                ->withErrors($validator, 'edit_product_' . (string)$product->id)
                ->withInput();  // Send input data back to the form
        }
    
        $validatedData = $validator->validated(); // Get validated data
    
        $product->update($validatedData); // Update the product with validated data
    
        return redirect('/products')->with('success', 'Product Updated Successfully');
    }

    public function delete(Product $product){
            $product->delete();
            return redirect('/products')->with('success','Product delted successfully');
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
    return response()->json($products);
    }
}
