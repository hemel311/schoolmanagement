<?php

namespace App\Http\Controllers\parents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParentsController extends Controller
{
    public function dashboard()
    {
        return view('parents.dashboard');
    }
}
