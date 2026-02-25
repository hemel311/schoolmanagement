<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class SectionController extends Controller
{
    protected $class,$teacher,$section;
    public function index()
    {
        $this->class=Group::all();
        $this->teacher=Teacher::all();

        return view('admin.section.addsection',['classes'=>$this->class,'teachers'=>$this->teacher]);
    }

    public function store(Request $request)
    {
        $request->validate([
           'class_id'=>'required',
           'section'=>'required',
           'class_teacher_id'=>'required',
        ]);
        Section::create(
            [
                'class_id'=>$request->class_id,
                'section'=>$request->section,
                'class_teacher_id'=>$request->class_teacher_id,

            ]

        );
        return redirect()->back()->with('success',"Section added successfully");
    }
    public function manage()
    {
        $this->section=Section::all();
        return view('admin.section.manage',['sections'=>$this->section]);
    }
    public function deleteSection($id)
    {
        $this->section=Section::findorfail($id);
        $this->section->delete();
        return redirect()->back()->with('success','Section Deleted Successfully');
    }
    public function edit($id)
    {
        $this->section=Section::findorfail($id);
        $this->class=Group::all();
        $this->teacher=Teacher::all();
        return view('admin.section.edit',['section'=>$this->section,'classes'=>$this->class,'teachers'=>$this->teacher]);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'class_id'=>'required',
            'section'=>'required',
            'class_teacher_id'=>'required',
        ]);
        $this->section=Section::findorfail($id);

        $this->section->update(
            [
                'class_id'=>$request->class_id,
                'section'=>$request->section,
                'class_teacher_id'=>$request->class_teacher_id,

            ]

        );
        return redirect()->back()->with('success',"Section Updated successfully");
    }
}
