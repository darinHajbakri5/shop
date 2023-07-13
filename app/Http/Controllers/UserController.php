<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function sellersRegister(){

        return view('user.register.sellers');
    }

    public function register(Request $request){

        $FormFields =$request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required|numeric|min:10',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',

        ]);

        $FormFields['password'] = bcrypt($FormFields['password']);
        $FormFields['role'] = 'seller';
        $user = User::create($FormFields);
        Auth::login($user);
        return redirect('/');
    }





    public function customersRegister(){
        return view('user.register.customers');
    }

    public function customerregister(Request $request){

        $FormFields =$request->validate([
            'first_name' => 'required',
            'last_name' => 'nullable',
            'phone_number'=> 'nullable',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $FormFields['password'] = bcrypt($FormFields['password']);
        $FormFields['role'] = 'customer';
        $user = User::create($FormFields);
        Auth::login($user);
        return redirect('/');
    }

    public function login(){
    return view('user.login');
    }

    public function authenticate(Request $request){
        $FormFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
            'role' => 'required',
        ]);
        if(auth()->attempt($FormFields)){
            $request->session()->regenerate();
            return redirect('/');
        }
        return back()->withErrors(['email' => 'Invalid Credentials']);

    }
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        return redirect('/');

    }


}
