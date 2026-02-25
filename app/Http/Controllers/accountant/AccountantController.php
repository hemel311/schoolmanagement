<?php

namespace App\Http\Controllers\accountant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountantController extends Controller
{
    public function Login()
    {
        return view('account.login');
    }
    public function accountantLogin(Request $request)
    {
//        dd($request->email);
        $check=$request->all();
        if(Auth::guard('accountant')->attempt(['email'=>$check['email'],'password'=>$check['password']]))
        {
            return redirect()->route('account.dashboard')->with('success',"Welcome Accountant");
        }
        else{
            return back()->with('error',"User Name or Password Wrong");
        }
    }
    public function accountantdashboard()
    {
        return view('account.dashboard');
    }
    public function accountantLogout()
    {
        Auth::guard('accountant')->logout();
        return redirect()->route('accountant_form')->with('success',"Logout Successfully");

    }
}
