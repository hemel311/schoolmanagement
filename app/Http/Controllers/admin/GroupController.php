<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    protected $group;
    public function index()
    {
        return view('admin.class.addclass');
    }
    public function store(Request $request)
    {
        $request->validate([
           'class'=>'required'
        ]);
        Group::create([
            'class'=>$request->class,
        ]);
        return redirect()->back()->with('success','Class added Successfully');
    }
    public function manage()
    {
        $this->group=Group::all();
        return view('admin.class.manageclass',['groups'=>$this->group]);
    }
    public function delete($id)
    {
        $this->group=Group::findorfail($id);
        $this->group->delete();
        return redirect()->route('manageclass')->with('success','Class Deleted successfully');
    }
    public function edit($id)
    {
        $this->group=Group::findorfail($id);
        return view('admin.class.editclass',['group'=>$this->group]);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'class'=>'required'
        ]);
        $this->group=Group::findorfail($id);
        $this->group->update([
            'class'=>$request->class,
        ]);
        return redirect()->back()->with('success','Class Updated Successfully');
    }
}
