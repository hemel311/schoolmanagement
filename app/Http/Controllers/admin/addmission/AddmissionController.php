<?php

namespace App\Http\Controllers\admin\addmission;

use App\Http\Controllers\Controller;
use App\Models\AddmissionOfficer;
use Illuminate\Http\Request;

class AddmissionController extends Controller
{
    public $addmissionOfficer,$addmissionOfficerImage,$imageName,$directory,$imageurl;
    public function index()
    {
        return view('admin.addmissionofficer.addadmissionofficer');
    }
    public function sendImage($request)
    {
        if($request->file('image'))
        {
            $this->addmissionOfficerImage=$request->file('image');
            $this->imageName='addmissionofficer'.time().'.'.$this->addmissionOfficerImage->getClientOriginalExtension();
            $this->directory='assets/admin/images/addmissionofficer/';
            $this->addmissionOfficerImage->move($this->directory,$this->imageName);
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
        ]);
        AddmissionOfficer::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'phone'=>$request->phone,
            'image'=>$this->sendImage($request),
        ]);
        return redirect()->back()->with('success','Addmission officer added Successfully');
    }

    public function manage()
    {
        $this->addmissionOfficer=AddmissionOfficer::all();
        return view('admin.addmissionofficer.manage',['addmissionofficers'=>$this->addmissionOfficer]);
    }
    public function delete($id)
    {
        $this->addmissionOfficer=AddmissionOfficer::findorfail($id);
        if(file_exists($this->addmissionOfficer->image))
        {
            unlink($this->addmissionOfficer->image);
        }
        $this->addmissionOfficer->delete();
        return redirect()->back()->with('success',"Addmission officer deleted successfully");
    }

    public function edit($id)
    {
        $this->addmissionOfficer=AddmissionOfficer::findorfail($id);
        return view('admin.addmissionofficer.edit',['addmissionofficer'=>$this->addmissionOfficer]);
    }
    public function update(Request $request,$id)
    {
        $this->addmissionOfficer=AddmissionOfficer::findorfail($id);

        $request->validate([
            'name'=>'required|string',
            'email'=>'required|string',
            'password'=>'required|string|min:6',
            'phone'=>'required|string',
        ]);
        if($request->file('image'))
        {
            if(file_exists($this->addmissionOfficer->image))
            {
                unlink($this->addmissionOfficer->image);
            }
            $this->imageurl=$this->sendImage($request);
        }
        else{
            $this->imageurl=$this->addmissionOfficer->image;
        }
        $this->addmissionOfficer->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'phone'=>$request->phone,
            'image'=>$this->imageurl,
        ]);

        return redirect()->back()->with('success',"Addmission Officer update successfully");
    }
}
