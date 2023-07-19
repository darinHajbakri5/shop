<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiProductController;

class ApiProductController extends Controller
{
    public function indexAll(){
        $product = Product::all();
        return response()->json($product, 200);

    }
    public function index($id ){
        $store = Store::findOrFail($id);
        $products = $store->products;
        return response()->json($products, 200);
    }



      public function storeProduct(Request $request){
        if(Auth::user()->can('CREATE_PRODUCT')){
        $validatedProduct = $request->validate([
            'title'=> 'required|string',
            'description' => 'required',
            'price' => 'required',
            'logo' => 'required|image|max:2048',
            'store_id' => 'required|exists:stores,id',
            'limit' =>'required',
            'basket' =>'0',

        ]);

        $path = $request->file('logo')->store('logos', 'public');

        $product = new Product($validatedProduct);
        $product->logo = $path;
        $product['seller_id'] = Auth::user()->id;
        $product->save();

        return response()->json($product, 200);
    }}




    public function updateProduct(Request $request, Product $product)
    {
        if(Auth::user()->can('UPDATE_PRODUCT') && $product->seller_id == Auth::user()->id){

    $product->update($request->all());
    return response()->json($product, 200);
}}

    public function destroyProduct(Product $product){
    if(Auth::user()->can('DELETE_PRODUCT') && $product->seller_id == Auth::user()->id){
    $product->delete();
    return response()->json($product, 200);
}
}}

