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
        $exams = Exam::all();

        return view('teacher.examark.searchstudent', compact('exams'));
    }

    public function searchStudent(Request $request)
    {
        $request->validate([
            'rollnumber' => 'required',
            'exam_type'  => 'required',
        ]);

        $this->teacher = Auth::guard('teacher')->user();

        $this->examtype = Exam::all();

        // Find student by roll number
        $this->student = Student::where('rollno', $request->rollnumber)->first();

        if (!$this->student) {
            return back()->with('error', 'Student not found');
        }

        // Check teacher authorization
        $this->sections = Section::where('id', $this->student->section_id)
            ->where('class_teacher_id', $this->teacher->id)
            ->where('class_id', $this->student->group_id)
            ->first();

        if (!$this->sections) {
            return back()->with('error', 'Student not from your section');
        }

        // Load subjects
        $this->subjects = Subject::where('group_id', $this->student->group_id)->get();

        if ($this->subjects->isEmpty()) {
            return back()->with('error', 'No subject assigned to this class');
        }

        // Load existing marks for the selected exam
        $this->existingMarks = Mark::where('student_id', $this->student->id)
            ->where('exam_type', $request->exam_type)
            ->get()
            ->keyBy('subject_id');

        return view('teacher.examark.mark', [
            'student'       => $this->student,
            'subjects'      => $this->subjects,
            'exams'         => $this->examtype,
            'existingMarks' => $this->existingMarks,
            'selectedExam'  => $request->exam_type,
        ]);
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

//    public function loadMarks(Request $request)
//    {
//        $student = Student::findOrFail($request->student_id);
//
//        $subjects = Subject::where('group_id', $student->group_id)->get();
//
//        $marks = Mark::where('student_id', $student->id)
//            ->where('exam_type', $request->exam_type)
//            ->get()
//            ->keyBy('subject_id');
//
//        $exams = Exam::all();
//
//        return view('teacher.examark.mark', [
//            'student' => $student,
//            'subjects' => $subjects,
//            'exams' => $exams,
//            'selectedExam' => $request->exam_type,
//            'existingMarks' => $marks,
//        ]);
//    }



}
