<?php

namespace App\Http\Controllers\accountant;

use App\Http\Controllers\Controller;
use App\Models\Fee;
use App\Models\FeeHead;
use App\Models\Group;
use Illuminate\Http\Request;

class FeesController extends Controller
{
    protected $fees;
    public function index()
    {
        return view('account.package.addpackage',['classes'=>Group::all(),'feeshead'=>FeeHead::all()]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'group_id' => 'required',
            'fee_head_id' => 'required',
            'month' => 'required|between:1,12',
            'amount' => 'required'
        ]);
        Fee::create(
            [
                'group_id'=>$request->group_id,
                'fee_head_id'=>$request->fee_head_id,
                'month'=>$request->month,
                'amount'=>$request->amount,
                ]
        );
        return redirect()->back()->with('success','Fees Created Successfully');
    }
    public function manageFees()
    {
        $this->fees=Fee::all();
        return view('account.package.managepackage',['packages'=>$this->fees]);
    }
    public function deleteFees($id)
    {
        $this->fees=Fee::findorfail($id);
        $this->fees->delete();

        return redirect()->back()->with('success','Fees deleted Successfully');
    }
    public function editFee($id)
    {
        $this->fees=Fee::findorfail($id);
        return view('account.package.editpackage',['fee'=>$this->fees,'classes'=>Group::all(),'feeshead'=>FeeHead::all()]);

    }
    public function updateFee(Request $request,$id)
    {
        $this->fees=Fee::findorfail($id);

        $request->validate([
            'group_id' => 'required',
            'fee_head_id' => 'required',
            'month' => 'required|between:1,12',
            'amount' => 'required'
        ]);
        $this->fees->update([
            'group_id'=>$request->group_id,
            'fee_head_id'=>$request->fee_head_id,
            'month'=>$request->month,
            'amount'=>$request->amount,

        ]);
        return redirect()->back()->with('success','Package Updated Successfully');
    }
}
