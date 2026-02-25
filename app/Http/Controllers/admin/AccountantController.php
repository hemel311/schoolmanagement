<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Accountant;
use Illuminate\Http\Request;

class AccountantController extends Controller
{
    public $accountant,$accountantImage,$imageName,$directory,$imageurl;
    public function index()
    {
        return view('admin.accountant.addaccountant');
    }
    public function sendImage($request)
    {
        if($request->file('image'))
        {
            $this->accountantImage=$request->file('image');
            $this->imageName='accountant'.time().'.'.$this->accountantImage->getClientOriginalExtension();
            $this->directory='assets/admin/images/accountant/';
            $this->accountantImage->move($this->directory,$this->imageName);
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
        Accountant::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'phone'=>$request->phone,
            'image'=>$this->sendImage($request),
        ]);
        return redirect()->back()->with('success','Accountant added Successfully');
    }

    public function manage()
    {
        $this->accountant=Accountant::all();
        return view('admin.accountant.manage',['accountants'=>$this->accountant]);
    }
    public function delete($id)
    {
        $this->accountant=Accountant::findorfail($id);
        if(file_exists($this->accountantImage->image))
        {
            unlink($this->accountantImage->image);
        }
        $this->accountant->delete();
        return redirect()->back()->with('success',"Accountant  deleted successfully");
    }

    public function edit($id)
    {
        $this->accountant=Accountant::findorfail($id);
        return view('admin.accountant.edit',['accountant'=>$this->accountant]);
    }
    public function update(Request $request,$id)
    {
        $this->accountant=Accountant::findorfail($id);

        $request->validate([
            'name'=>'required|string',
            'email'=>'required|string',
            'phone'=>'required|string',
        ]);
        if($request->file('image'))
        {
            if(file_exists($this->accountant->image))
            {
                unlink($this->accountant->image);
            }
            $this->imageurl=$this->sendImage($request);
        }
        else{
            $this->imageurl=$this->accountant->image;
        }
        $this->accountant->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'phone'=>$request->phone,
            'image'=>$this->imageurl,
        ]);

        return redirect()->back()->with('success',"Accountant update successfully");
    }
}
