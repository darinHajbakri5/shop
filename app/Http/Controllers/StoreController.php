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

    public function store(Request $request){
        if (Auth::user()->can('CREATE_STORE')) {

             $store = $request->validate([
            'store_name'=>'required',
            'email'=>'required|email',
            'city'=>'required',
            ]);

            $store['user_id'] = Auth::user()->id;
            Store::create($store);
            return redirect('/');
        }
    }

    public function edit($id)
    {
       if (Auth::user()->can('EDIT_STORE')) {

        $store = Store::findOrFail($id);
        return view ('store.edit',compact('store'));
   }
}


    public function update(Request $request, Store $store)
    {
         if (Auth::user()->can('EDIT_STORE')) {

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
