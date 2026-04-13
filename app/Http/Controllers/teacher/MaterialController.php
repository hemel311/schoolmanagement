<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Material;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
{
    protected $materials;
    protected $groups;
    protected $sections;

    public function index()
    {
        $this->groups=Group::all();
        $this->sections=Section::all();
        $teacher=Auth::guard('teacher')->user();
        $materials=Material::where('teacher_id',$teacher->id)->latest()->get();

        return view('teacher.material.uploadmaterial',['materials'=>$materials,'groups'=>$this->groups,'section'=>$this->sections]);
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
            'title'=>'required',
            'file'=>'required|mimes:pdf,doc,docx,ppt,pptx|max:10000'
        ]);

        $teacher = Auth::guard('teacher')->user();

        $this->sections = Section::where('class_teacher_id',$teacher->id)->first();

        $fileName = time().'.'.$request->file('file')->extension();

        $request->file('file')->move(public_path('materials'),$fileName);

        Material::create([

            'teacher_id'=>$teacher->id,
            'group_id'=>$request->group_id,
            'section_id'=>$request->section_id,
            'title'=>$request->title,
            'file'=>$fileName,
            'description'=>$request->description

        ]);

        return back()->with('success','Material uploaded successfully');
    }
    public function manage()
    {
        $teacher=Auth::guard('teacher')->user();
        $this->materials=Material::where('teacher_id',$teacher->id)->get();
//        dd($this->materials);
        return view('teacher.material.managematerial',['materials'=>$this->materials]);
    }
    public function delete($id)
    {
        $this->materials=Material::findorfail($id);
        if(file_exists($this->materials->file))
        {
            unlink($this->materials->file);
        }
        $this->materials->delete();
        return redirect()->back()->with('success','Material Deleted successfully');
    }

}
