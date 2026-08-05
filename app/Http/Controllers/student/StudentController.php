<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Invoice;
use App\Models\Mark;
use App\Models\onlineClass;
use App\Models\StudentAttendence;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    protected $student;
    protected $classSchedule;
    protected $attendenceView;
    protected $fees;
    protected $examtype;
    protected $marks;
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
    public function myProfile()
    {
        $this->student=Auth::guard('student')->user();
        return view('student.myprofile.myprofile',['student'=>$this->student]);
    }
    public function examtype()
    {
        $this->examtype=Exam::all();
        return view('student.exam.examdetails',['exams'=>$this->examtype]);
    }

    public function marks(Request $request)
    {
        $student = Auth::guard('student')->user();

        $exam = Exam::findOrFail($request->exam_type);

        $marks = Mark::with('subject')
            ->where('student_id', $student->id)
            ->where('exam_type', $request->exam_type)
            ->get();

        return view('student.exam.mark', [
            'marks' => $marks,
            'exam_type' => $exam,
        ]);
    }
    public function downloadMarksheet($examId)
    {
        $student = Auth::guard('student')->user();

        $exam = Exam::findOrFail($examId);

        $marks = Mark::with('subject')
            ->where('student_id', $student->id)
            ->where('exam_type', $examId)
            ->get();

        $pdf = Pdf::loadView('student.exam.marksheet-pdf', [
            'marks' => $marks,
            'exam_type' => $exam,
        ]);

        $pdf->setPaper('A4', 'portrait');

        return $pdf->stream('Marksheet.pdf');
    }

}
