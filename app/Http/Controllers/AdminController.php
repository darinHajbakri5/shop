<?php

namespace App\Http\Controllers;
use Silber\Bouncer\BouncerFacade as Bouncer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //admin register
    public function adminRegister(){
        return view('user.register.admin');
    }
    public function registeradmin(Request $request){

        $FormFields =$request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required|numeric|min:10',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',

        ]);

        $FormFields['password'] = bcrypt($FormFields['password']);
        $FormFields['role'] = 'admin';
        $user = User::create($FormFields);
        Bouncer::assign('admin')->to($user);
        Auth::login($user);
        return redirect('/');
    }

    //customer list
    public function customer(Request $request)
    {
    if (Auth::user()->can('CUSTOMER_LIST')) {

        $customer = User::where('role', 'customer')->get();
        return view('admin.customer', compact('customer'));
    }

    }
        //create a new customer
        public function createcustomer(){
            if (Auth::user()->can('CREATE_CUSTOMER')) {
            return view('admin.register.customers');

        }
    }
        public function storecustomer(Request $request){
           if (Auth::user()->can('CREATE_CUSTOMER')) {

            $customer = $request->validate([
                'first_name' => 'required',
                'last_name' => 'nullable',
                'phone_number'=> 'nullable',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed|min:6',
            ]);

            $customer['password'] = bcrypt($customer['password']);
            $customer['role'] = 'customer';
            $customer = User::create($customer);
            return redirect('/users/customer');

        }
    }

    //edit customer list
     public function editcustomer($id)
    {
        if (Auth::user()->can('CUSTOMER_EDIT')) {
        $customer = User::findOrFail($id);
        return view ('admin.editCustomer',compact('customer'));
   }
}

    //update customer list
    public function updatecustomer(Request $request, User $customer)
    {
        if (Auth::user()->can('CUSTOMER_EDIT')) {
        $customer->update($request->all());
        return redirect()->route('customer.list');

    }
}

    //destroy customer list
    public function destroycustomer(User $customer){

        $customer->delete();
        return redirect('/users/customer');
    }


    //sellers list
    public function seller(Request $request)
        {
       if (Auth::user()->can('SELLER_LIST')) {
            $seller = User::where('role', 'seller')->get();
            return view('admin.seller', compact('seller'));
        }

        }

   // Create a new customer
public function createseller()
{
    if (Auth::user()->can('CREATE_SELLER')) {
        return view('admin.register.sellers');
    }
}

public function storeseller(Request $request)
{
    if (Auth::user()->can('CREATE_SELLER')) {

        $seller = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number'=> 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);


        $seller['password'] = bcrypt($seller['password']);
        $seller['role'] = 'seller';


        $seller = User::create($seller);

        return redirect('/users/seller');
    }
}
    //edit seller list
    public function editseller($id)
        {
            if (Auth::user()->can('EDIT_SELLER')) {
            $seller = User::findOrFail($id);
            return view ('admin.editSeller',compact('seller'));
        }
    }
    //update seller list
    public function updateseller(Request $request, User $seller)
        {
            if (Auth::user()->can('EDIT_SELLER')) {
            $seller->update($request->all());
            return redirect()->route('seller.list');

        }
    }
    public function destroyseller(User $seller){
        if (Auth::user()->can('DELETE_STORE')) {
            $seller->delete();
            return redirect('/users/seller');
        }
    }
}
