<?php

namespace App\Http\Controllers;
use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade as Bouncer;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiStoreController extends Controller
{
    public function index(Request $request ){
        $store = Store::all();
        return response()->json($store, 200);
    }


    public function show(Store $store){
       return response()->json($store, 200);
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
            return response()->json($storeData, 200);


        }

    }


    public function update(Request $request, Store $store)
    {
        if (Auth::user()->can('EDIT_STORE') && $store->user_id == Auth::user()->id) {
            $store->update($request->all());
            return response()->json($store, 200);
        }
    }
   public function destroy(Store $store){
    if (Auth::user()->can('DELETE_STORE')) {
        $store->delete();
        return response()->json($store, 200);

}
}

}
