<?php

namespace App\Http\Controllers\CommonLogin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommonLoginCntroller extends Controller
{
    protected $identity,$password;
    /**
     * Show the main login page
     */
    public function loginPage()
    {
        return view('commonlogin.login');
    }

    /**
     * Handle login for multiple user types
     */
    public function login(Request $request)
    {
        $request->validate([
            'identity' => 'required',
            'password' => 'required',
        ]);

        $this->identity = $request->identity;
        $this->password = $request->password;

        // -----------------------
        // ADDMISSION OFFICER LOGIN
        // -----------------------
        if (Auth::guard('addmission')->attempt(['email' => $this->identity, 'password' => $this->password])) {
            $request->session()->regenerate(); // important for multi-guard
            return redirect()->route('addmission.dashboard')->with('success','Welcome Addmission Officer');
        }

        // -----------------------
        // ACCOUNTANT LOGIN
        // -----------------------
        if (Auth::guard('accountant')->attempt(['email' => $this->identity, 'password' => $this->password])) {
            $request->session()->regenerate();
            return redirect()->route('account.dashboard')->with('success','Welcome Accountant');
        }
        //teacher login
        if (Auth::guard('teacher')->attempt(['email' => $this->identity, 'password' => $this->password])) {

            $request->session()->regenerate();
            return redirect()->route('teacher.dashboard')->with('success','Welcome Teacher');
        }
        //parents login
        if (Auth::guard('parents')->attempt(['parent_email' => $this->identity, 'password' => $this->password])) {
//            dd($this->password);
            $request->session()->regenerate(); // important for multi-guard
            return redirect()->route('parents.dashboard')->with('success','Welcome parents');
        }
        if (Auth::guard('student')->attempt(['email' => $this->identity, 'password' => $this->password])) {
//            dd($this->password);
            $request->session()->regenerate(); // important for multi-guard
            return redirect()->route('student.dashboard')->with('success','Welcome Student');
        }

        // -----------------------
        // Optional: Add more guards here if needed
        // STUDENT, TEACHER, PARENT, etc.
        // -----------------------

        // If none matched, redirect back with error
        return back()->with('error', 'Invalid credentials');
    }

    /**
     * Logout user from all guards
     */
    public function logout(Request $request)
    {
        $guards = ['addmission', 'accountant','teacher','parents','student'];

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                Auth::guard($guard)->logout();
            }
        }

        // Fully invalidate the session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form')->with('success','logout successfully');
    }
}
