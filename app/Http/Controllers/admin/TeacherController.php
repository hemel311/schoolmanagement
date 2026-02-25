<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public $teacher,$teacherImage,$imageName,$directory,$imageurl;
    public function index()
    {
        return view('admin.teacher.addteacher');
    }
    public function sendImage($request)
    {
        if($request->file('image'))
        {
            $this->teacherImage=$request->file('image');
            $this->imageName='teacher'.time().'.'.$this->teacherImage->getClientOriginalExtension();
            $this->directory='assets/admin/images/teacher/';
            $this->teacherImage->move($this->directory,$this->imageName);
            $this->imageurl=$this->directory.$this->imageName;
            return $this->imageurl;
        }
        else
        {
            return "";
        }

    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|string',
            'password'=>'required|string|min:6',
            'phone'=>'required|string',
            'education'=>'required|string',
            'subject'=>'required|string',
            'address'=>'required|string',
            'date'=>'required',
        ]);
        Teacher::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'phone'=>$request->phone,
            'education'=>$request->education,
            'subject'=>$request->subject,
            'address'=>$request->address,
            'date'=>$request->date,
            'image'=>$this->sendImage($request),
        ]);
        return redirect()->back()->with('success','Teacher added Successfully');
    }

    public function manage()
    {
        $this->teacher=Teacher::all();
        return view('admin.teacher.manage',['teachers'=>$this->teacher]);
    }
    public function delete($id)
    {
        $this->teacher=Teacher::findorfail($id);
        if(file_exists($this->teacher->image))
        {
            unlink($this->teacher->image);
        }
        $this->teacher->delete();
        return redirect()->back()->with('success',"Teacher deleted successfully");
    }

    public function edit($id)
    {
        $this->teacher=Teacher::findorfail($id);
        return view('admin.teacher.edit',['teacher'=>$this->teacher]);
    }
    public function update(Request $request,$id)
    {
        $this->teacher=Teacher::findorfail($id);
        $this->teacher->email=$request->email;
        $this->password=Hash::make($request->password);
        $this->teacher->save();

        return redirect()->back()->with('success',"Teacher update successfully");
    }

}
