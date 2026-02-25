<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentDetailsController extends Controller
{
    protected $studentDetails;
    public function index()
    {
        return view('teacher.studentdetails.studentdetailssearch');
    }
    public function searchStudent(Request $request)
    {
        $this->studentDetails=Student::where('rollno',$request->rollnumber)->first();
//        dd($this->studentDetails);
        return view('teacher.studentdetails.studentdetails',['student'=>$this->studentDetails]);

    }
}
