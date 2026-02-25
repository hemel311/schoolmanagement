<?php

namespace App\Http\Controllers\addmission;

use App\Http\Controllers\Controller;
use App\Models\Fee;
use App\Models\Group;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Parents;
use App\Models\Section;
use App\Models\Student;
use App\Models\StudentPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentAddController extends Controller
{
    protected $parents,$student,$studentImage,$imageName,$directory,$imageurl,$parent;

    public function sendImage($request)
    {
        if($request->file('image'))
        {
            $this->studentImage=$request->file('image');
            $this->imageName='student'.time().'.'.$this->studentImage->getClientOriginalExtension();
            $this->directory='assets/addmission/images/student/';
            $this->studentImage->move($this->directory,$this->imageName);
            $this->imageurl=$this->directory.$this->imageName;
            return $this->imageurl;
        }
        else
        {
            return "";
        }

    }
    public function addStudent()
    {
        return view('addmissionofficer.addstudent.addstudent',['classes'=>Group::all(),'sections'=>Section::all()]);
    }
    public function createStudent(Request $request)
    {
        // Define invoice variable
        $invoice = null;

        DB::transaction(function () use ($request, &$invoice) {

            // -------- Parent --------
            $parent = Parents::create([
                'father_name'     => $request->father_name,
                'mother_name'     => $request->mother_name,
                'parent_email'    => $request->parent_email,
                'parent_password' => bcrypt($request->parent_password),
            ]);

            // -------- Student --------
            $lastRoll = Student::max('rollno');

            $rollNo = $lastRoll ? $lastRoll + 1 : 1000;
            $student = Student::create([
                'rollno'            =>$rollNo,
                'name'              => $request->name,
                'email'             => $request->email,
                'password'          => bcrypt($request->password),
                'dob'               => $request->dob,
                'present_address'   => $request->present_address,
                'permanent_address' => $request->permanent_address,
                'image'             => $this->sendImage($request),
                'group_id'          => $request->group_id,
                'section_id'        => $request->section_id,
                'parent_id'         => $parent->id,
            ]);

            // -------- Payment Logic --------
            $totalAmount = $request->total_amount;
            $paidAmount  = $request->paid_amount;
            $dueAmount   = max($totalAmount - $paidAmount, 0);
            $status      = $dueAmount == 0 ? 'paid' : 'due';

            // -------- Student Payment --------
            StudentPayment::create([
                'student_id'   => $student->id,
                'total_amount' => $totalAmount,
                'month'        => 1,
                'paid_amount'  => $paidAmount,
                'due_amount'   => $dueAmount,
                'status'       => $status,
            ]);

            // -------- Invoice --------
            $invoice = Invoice::create([
                'invoice_no'   => 'INV-' . now()->format('Ymd') . '-' . rand(1000, 9999),
                'rollno'   => $student->rollno,
                'month'=>1,
                'total_amount' => $totalAmount,
                'paid_amount'  => $paidAmount,
                'due_amount'   => $dueAmount,
                'status'       => $status,
            ]);

            // -------- Invoice Items --------
            $fees = Fee::where('group_id', $request->group_id)->get();
            foreach ($fees as $fee) {
                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'fee_head'   => $fee->feeHead->name,
                    'amount'     => $fee->amount,
                ]);
            }
        });

        // -------- Redirect to Invoice Preview --------
        return redirect()->route('invoice.show', $invoice->id);
    }

    public function manageStudent()
    {
        $this->student=Student::all();
        return view('addmissionofficer.addstudent.managestudent',['students'=>$this->student]);

    }
    public function deleteStudent($id)
    {

        $this->student=Student::findorFail($id);
        if(file_exists($this->student->image))
        {
            unlink($this->student->image);
        }
        $this->parent = $this->student->parent;

        // delete student
        $this->student->delete();

        // delete parent manually
        if ($this->parent) {
            $this->parent->delete();
        }
        return redirect()->back()->with('success','Student Deleted Successfully');

    }
    public function editstudent($id)
    {
        $this->student=Student::findorFail($id);
        return view('addmissionofficer.addstudent.editstudent',['student'=>$this->student,'classes'=>Group::all(),'sections'=>Section::all()]);

    }
    public function updateStudent(Request $request,$id)
    {
        $this->student=Student::findorfail($id);
        $this->parents=Parents::findorfail($this->student->parent_id);
        if($request->file('image'))
        {
            if(file_exists($this->student->image))
            {
                unlink($this->student->image);
            }
            $this->imageurl=$this->sendImage($request);
        }
        else{
            $this->imageurl=$this->student->image;
        }
        $this->student->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'dob'=>$request->dob,
            'present_address'=>$request->present_address,
            'permanent_address'=>$request->permanent_address,
            'image'=>$this->imageurl,
            'group_id'=>$request->group_id,
            'section_id'=>$request->section_id,
            'parent_id'=>$this->student->parent_id,

        ]);
        $this->parents->update([
            'father_name' =>$request->father_name,
            'mother_name' =>$request->mother_name,
            'parent_email' =>$request->parent_email,
            'parent_password' =>bcrypt($request->parent_password)]);
        return redirect()->back()->with('success','Student Update Successfully');
    }

}
