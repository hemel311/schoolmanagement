<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    protected $group;
    protected $subjects;
    public function index()
    {
        $this->group=Group::all();
        return view('admin.subject.subject',['groups'=>$this->group]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'subject'=>'required'
        ]);
        Subject::create([
            'group_id'=>$request->group_id,
            'subject'=>$request->subject,
        ]);
        return redirect()->back()->with('success','Subject added Successfully');
    }
    public function manage()
    {
        $this->subjects=Subject::all();
        return view('admin.subject.managesubject',['subjects'=>$this->subjects]);
    }
    public function delete($id)
    {
        $this->subjects=Subject::findorfail($id);
        $this->subjects->delete();
        return redirect()->route('managesubject')->with('success','Subject Deleted successfully');
    }
    public function edit($id)
    {
        $this->subjects=Subject::findorfail($id);
        return view('admin.subject.editsubject',['subject'=>$this->subjects]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'subject'=>'required'
        ]);
        Subject::create([
            'group_id'=>$request->group_id,
            'subject'=>$request->subject,
        ]);
        return redirect()->back()->with('success','Subject added Successfully');
    }
}
