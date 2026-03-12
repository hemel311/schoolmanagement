<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
{
    public function index()
    {
        $teacher=Auth::guard('teacher')->user();
        $section=Section::where('class_teacher_id',$teacher->id)->first();
        $materials=Material::where('teacher_id',$teacher->id)->latest()->get();

        return view('teacher.material.uploadmaterial',['materials'=>$materials,'sections'=>$section]);
    }
    public function store(Request $request)
    {
//        dd($request);
        $request->validate([
            'title'=>'required',
            'file'=>'required|mimes:pdf,doc,docx,ppt,pptx|max:10000'
        ]);

        $teacher = Auth::guard('teacher')->user();

        $section = Section::where('class_teacher_id',$teacher->id)->first();

        $fileName = time().'.'.$request->file('file')->extension();

        $request->file('file')->move(public_path('materials'),$fileName);

        Material::create([

            'teacher_id'=>$teacher->id,
            'group_id'=>$section->class_id,
            'section_id'=>$section->id,
            'title'=>$request->title,
            'file'=>$fileName,
            'description'=>$request->description

        ]);

        return back()->with('success','Material uploaded successfully');
    }
}
