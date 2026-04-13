<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\onlineClass;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnlineClassController extends Controller
{
    protected $groups;
    protected $sections;
    public function index()
    {
        $this->groups=Group::all();
        $this->sections=Section::all();
        $teacher=Auth::guard('teacher')->user();
        $onlineClass=onlineClass::where('teacher_id',$teacher->id)->latest()->get();
        return view('teacher.onlineclass.onlineclass',['groups'=>$this->groups,'sections'=>$this->sections,'onlineclass'=>$onlineClass]);
    }
    public function getSections(Request $request)
    {
        $sections = Section::where('class_id', $request->group_id)->get();

        return response()->json($sections);
    }
    public function store(Request $request)
    {
//        dd($request);
        $request->validate([
            'subject'=>'required',
            'time'=>'required',
            'platform'=>'required',
            'link'=>'required',
        ]);

        $teacher = Auth::guard('teacher')->user();

        $this->sections = Section::where('class_teacher_id',$teacher->id)->first();

        onlineClass::create([

            'teacher_id'=>$teacher->id,
            'group_id'=>$request->group_id,
            'section_id'=>$request->section_id,
            'subject'=>$request->subject,
            'time'=>$request->time,
            'platform'=>$request->platform,
            'link'=>$request->link,

        ]);

        return back()->with('success','Class Schedule successfully');
    }
}
