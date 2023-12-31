<?php

namespace App\Http\Controllers;
use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade as Bouncer;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function index(Request $request ){
        $store = Store::all();
        return view('store.index', compact('store'));
    }


    public function show(Store $store){
        return view('store.show', compact('store'));
    }

        public function create(){
       if (Auth::user()->can('CREATE_STORE')) {
            return view('store.create');
        }
    }

    public function store(Request $request)
    {
        if (Auth::user()->can('CREATE_STORE')) {
            $validatedData = $request->validate([
                'store_name' => 'required',
                'email' => 'required|email',
                'city' => 'required',
                'logo' => 'required|image|max:2048',
            ]);

            $path = $request->file('logo')->store('assets', 'public');

            $storeData = $validatedData;
            $storeData['user_id'] = Auth::user()->id;
            $storeData['logo'] = $path;

            Store::create($storeData);

            return redirect('/store');
        }
    }
    public function edit(Store $store)
    {
        if (Auth::user()->can('EDIT_STORE') && $store->user_id == Auth::user()->id) {
            return view ('store.edit',compact('store'));
        }
    }

    public function update(Request $request, Store $store)
    {
        if (Auth::user()->can('EDIT_STORE') && $store->user_id == Auth::user()->id) {
            $store->update($request->all());
            return redirect('/');
        }
    }
   public function destroy(Store $store){
    if (Auth::user()->can('DELETE_STORE')) {
        $store->delete();
        return redirect()->route('home');

}
}

    public function manage(){
         if (Auth::user()->can('MANAGE_STORE')) {
             if(auth()->check()) {
                $stores = auth()->user()->stores;
                return view('store.manage', ['stores' =>$stores]);
    }}
}}
