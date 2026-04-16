<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\onlineClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    protected $student;
    protected $classSchedule;
    public function dashboard()
    {
        return view('student.dashboard');
    }

    public function onlineClass()
    {
        $this->student=Auth::guard('student')->user();
//        dd($this->student);
        $this->classSchedule=onlineClass::where([
            ['group_id', '=', $this->student->group_id],
            ['section_id', '=', $this->student->section_id],
        ])->get();
//        dd($this->classSchedule);
        return view('student.onlineclass.classschedule',['schedules'=>$this->classSchedule]);
    }
}
