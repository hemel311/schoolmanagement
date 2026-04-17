<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\onlineClass;
use App\Models\StudentAttendence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    protected $student;
    protected $classSchedule;
    protected $attendenceView;
    protected $fees;
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

    public function studentAttendenceView()
    {
        $this->student=Auth::guard('student')->user();
        $this->attendenceView=StudentAttendence::where('student_id',$this->student->id)->get();
//        dd($this->attendenceView);
        return view('student.attendence.studentattendenceview',['attendences'=>$this->attendenceView]);
    }

    public function seeFees()
    {
        $this->student=Auth::guard('student')->user();
        $this->fees=Invoice::where('rollno',$this->student->rollno)->get();
//        dd($this->fees);
        return view('student.fees.seefees',['fees'=>$this->fees]);

    }
}
