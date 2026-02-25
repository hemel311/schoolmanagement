<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\FeeHead;
use Illuminate\Http\Request;

class FeeheadController extends Controller
{
    protected $feeHead;
    public function index()
    {
        return view('admin.accountant.feehead.addfeehead');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        FeeHead::create([
            'name'=>$request->name,
        ]);
        return redirect()->back()->with('success','Fee Head added Successfully');
    }
    public function manage()
    {
        $this->feeHead=FeeHead::all();
        return view('admin.accountant.feehead.managefeehead',['feeheads'=>$this->feeHead]);
    }
    public function delete($id)
    {
        $this->feeHead=FeeHead::findorfail($id);
        $this->feeHead->delete();
        return redirect()->route('managefeehead')->with('success','Fee Head Deleted successfully');
    }
}
