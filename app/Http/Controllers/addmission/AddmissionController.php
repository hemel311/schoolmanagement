<?php

namespace App\Http\Controllers\addmission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddmissionController extends Controller
{
    public function Login()
    {
        return view('addmissionofficer.login');
    }
    public function AddmissionOfficerLogin(Request $request)
    {
//        dd($request->email);
        $check=$request->all();
        if(Auth::guard('addmission')->attempt(['email'=>$check['email'],'password'=>$check['password']]))
        {
            return redirect()->route('addmission.dashboard')->with('success',"Welcome Addmission Officer");
        }
        else{
            return back()->with('error',"User Name or Password Wrong");
        }
    }
    public function AddmissionDashboard()
    {
        return view('addmissionofficer.dashboard');
    }
    public function AddmissionOfficerLogout()
    {
        Auth::guard('addmission')->logout();
        return redirect()->route('addmission_form')->with('success',"Logout Successfully");

    }
}
