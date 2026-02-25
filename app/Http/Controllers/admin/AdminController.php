<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function Login()
    {
        return view('admin.login');
    }
    public function adminLogin(Request $request)
    {
//        dd($request->email);
        $check=$request->all();
        if(Auth::guard('admin')->attempt(['email'=>$check['email'],'password'=>$check['password']]))
        {
            return redirect()->route('admin.dashboard')->with('success',"Welcome Admin");
        }
        else{
            return back()->with('error',"User Name or Password Wrong");
        }
    }
    public function dashboard()
    {
        return view('admin.dashboard.dashboard');
    }
    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login.form')->with('success',"Logout Successfully");

    }
}
