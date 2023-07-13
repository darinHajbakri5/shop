<?php

namespace App\Http\Controllers;


use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function indexAll(){
        $product = Product::all();
        return view ('product.indexAll',compact('product'));
    }
    public function index($id ){
        $store = Store::findOrFail($id);
        $products = $store->products;
        return view ('product.index', compact('products'));
    }

    public function createProduct(){
        if(Auth::user()->can('CREATE_PRODUCT')){
      return view('product.create');
    }
      }

      public function storeProduct(Request $request){
        if(Auth::user()->can('CREATE_PRODUCT')){
        $validatedProduct = $request->validate([
            'title'=> 'required|string',
            'description' => 'required',
            'price' => 'required',
            'logo' => 'required|image|max:2048',
            'store_id' => 'required|exists:stores,id',

        ]);

        $path = $request->file('logo')->store('logos', 'public');

        $product = new Product($validatedProduct);
        $product->logo = $path;
        $product['seller_id'] = Auth::user()->id;
        $product->save();

        return redirect('/');
    }}

    public function editProduct($id)
    {
        if(Auth::user()->can('UPDATE_PRODUCT')){
        $product = Product::findOrFail($id);
        return view ('product.edit',compact('product'));
}}


    public function updateProduct(Request $request, Product $product)
    {
        if(Auth::user()->can('UPDATE_PRODUCT')){

    $product->update($request->all());
    return redirect('/manage');
}}

public function destroyProduct(Product $product){
    if(Auth::user()->can('DELETE_PRODUCT')){
    $product->delete();
    return redirect()->route('home');
}
}
}
