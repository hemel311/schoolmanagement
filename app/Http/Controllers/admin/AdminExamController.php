<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Http\Request;

class AdminExamController extends Controller
{
    protected $exam;
    public function index()
    {
        return view('admin.exam.addexam');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        Exam::create([
            'name'=>$request->name,
        ]);
        return redirect()->back()->with('success','Exam added Successfully');
    }
    public function manage()
    {
        $this->exam=Exam::all();
        return view('admin.exam.manageexam',['exams'=>$this->exam]);
    }
    public function delete($id)
    {
        $this->exam=Exam::findorfail($id);
        $this->exam->delete();
        return redirect()->route('manageexam')->with('success','Exam Deleted successfully');
    }
    public function edit($id)
    {
        $this->exam=Exam::findorfail($id);
        return view('admin.exam.editexam',['exam'=>$this->exam]);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $this->exam=Exam::findorfail($id);
        $this->exam->update([
            'name'=>$request->name,
        ]);
        return redirect()->back()->with('success','Exam Updated Successfully');
    }

}
