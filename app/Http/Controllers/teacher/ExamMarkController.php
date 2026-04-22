<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Mark;
use App\Models\Section;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamMarkController extends Controller
{
    protected $student;
    protected $subjects;
    protected $teacher;
    protected $sections;
    protected $groups;
    protected $examtype;
    public function index()
    {
        return view('teacher.examark.searchstudent');
    }

    public function searchStudent(Request $request)
    {
        $this->examtype=Exam::all();
        $this->teacher=Auth::guard('teacher')->user();
        $request->validate([
            'rollnumber' => 'required'
        ]);

        $this->student = Student::where('rollno', $request->rollnumber)->first();

        if (!$this->student) {
            return back()->with('error', 'Student not found');
        }
        $this->sections=Section::where('id',$this->student->section_id)->where('class_teacher_id',$this->teacher->id)->where('class_id',$this->student->group_id)->first();
        if (!$this->sections)
        {
            return back()->with('error', 'Student not from your Section');
        }

        $this->subjects = Subject::where('group_id', $this->student->group_id)->get();

        if ( $this->subjects->isEmpty()) {
            return back()->with('error', 'No subject assigned to this class');
        }

        return view('teacher.examark.mark', ['student'=>$this->student,'subjects'=>$this->subjects,'exams'=>$this->examtype]);
}
    public function storeMarks(Request $request)
    {
//        dd($request);
        $request->validate([
            'student_id' => 'required',
            'marks'      => 'required|array',
            'exam_type'=>'required',
        ]);

        foreach ($request->marks as $subject_id => $mark) {
            if ($mark === null || $mark === '') {
                continue;
            }
            Mark::updateOrCreate(

                [
                    'student_id' => $request->student_id,
                    'exam_type'=>$request->exam_type,
                    'subject_id' => $subject_id,
                ],
                [
                    'mark' => $mark
                ]

            );
        }

        return redirect()->route('searchstudent')->with('success', 'Marks saved successfully');
    }



}
