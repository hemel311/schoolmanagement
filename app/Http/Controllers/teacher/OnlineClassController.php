<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\onlineClass;
use App\Models\Section;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnlineClassController extends Controller
{
    protected $groups;
    protected $sections;
    protected $schedule;
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

    public function manage()
    {
        $teacher=Auth::guard('teacher')->user();
        $this->schedule=onlineClass::where('teacher_id',$teacher->id)->get();

        return view('teacher.onlineclass.manageonlineclass',['groups'=>$this->groups,'section'=>$this->sections,'schedules'=>$this->schedule]);
    }
    public function delete($id)
    {
        $this->schedule=onlineClass::findorfail($id);
        $this->schedule->delete();
        return redirect()->back()->with('success','Schedule Deleted Successfully');
    }
    public function edit($id)
    {
        $teacher=Auth::guard('teacher')->user();
        $this->schedule=onlineClass::findorfail($id);
        $this->groups=Group::all();
        $this->sections=Section::all();
        return view('teacher.onlineclass.editonlineclass',['section'=>$this->sections,'groups'=>$this->groups,'teachers'=>$teacher,'schedule'=>$this->schedule]);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'group_id'=>'required',
            'section_id'=>'required',
            'teacher_id'=>'required',
            'subject'=>'required',
            'time'=>'required',
            'platform'=>'required',
            'link'=>'required',
        ]);
        $this->schedule=onlineClass::findorfail($id);

        $this->schedule->update(
            [
                'group_id'=>$request->group_id,
                'section_id'=>$request->section_id,
                'teacher_id'=>$request->teacher_id,
                'subject'=>$request->subject,
                'time'=>$request->time,
                'platform'=>$request->platform,
                'link'=>$request->link,

            ]

        );
        return redirect()->back()->with('success',"Class schedule Updated successfully");
    }

}
