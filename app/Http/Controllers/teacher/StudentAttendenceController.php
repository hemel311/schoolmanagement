<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Student;
use App\Models\StudentAttendence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentAttendenceController extends Controller
{
    protected $students;
    protected $teachers;
    protected $section;
    public function index()
    {
        $this->teachers = Auth::guard('teacher')->user();

        // find teacher section
        $this->section = Section::where('class_teacher_id',$this->teachers->id)->first();

        if(!$this->section){
            return back()->with('error','You are not assigned to any section');
        }

        $this->students = Student::where('section_id',$this->section->id)->get();

        return view('teacher.studentattendence.addattendence',[
            'students'=>$this->students,
            'section'=>$this->section
        ]);


    }
    public function store(Request $request)
    {
        $request->validate([
            'attendance'=>'required|array'
        ]);

        $this->teachers = Auth::guard('teacher')->user();

        foreach($request->attendance as $student_id => $status){

            StudentAttendence::updateOrCreate(

                [
                    'student_id'=>$student_id,
                    'date'=>date('Y-m-d')
                ],

                [
                    'teacher_id'=>$this->teachers->id,
                    'section_id'=>$request->section_id,
                    'status'=>$status
                ]

            );
        }

        return redirect()->back()->with('success','Attendance saved successfully');
    }

}
