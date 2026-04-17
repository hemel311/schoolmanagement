<?php

namespace App\Http\Controllers\accountant;

use App\Http\Controllers\Controller;
use App\Models\Fee;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Student;
use App\Models\StudentPayment;
use Illuminate\Http\Request;

class StudentpaymentController extends Controller
{
    protected $studentData;
    protected $payment;
    public function index()
    {
        return view('account.studentpayment.searchpaymentdetails');
    }
    public function searchStudent(Request $request)
    {
        $this->studentData = Student::where('rollno', $request->rollnumber)->first();
//     dd($this->studentData);
        if($this->studentData)
        {
            return view('account.studentpayment.addpayment',['students'=>$this->studentData]);
        }
        else
        {
            return view('account.studentpayment.notfound');
        }

    }
    public function createPayment(Request $request)
    {
//        dd($request->group_id);
        $totalAmount = $request->total_amount;
        $paidAmount  = $request->paid_amount;
        $dueAmount   = max($totalAmount - $paidAmount, 0);//0,0
        $status      = $dueAmount == 0 ? 'paid' : 'due';
        StudentPayment::create([
           'student_id'=>$request->student_id,
            'month'=>$request->month,
            'total_amount'=>$request->total_amount,
            'paid_amount'=>$request->paid_amount,
            'due_amount'=>$request->due_amount,
            'status'=>$status

        ]);

        $invoice = Invoice::create([
            'invoice_no'   => 'INV-' . now()->format('Ymd') . '-' . rand(1000, 9999),
            'rollno'   =>$request->rollno,
            'month'=>$request->month,
            'total_amount' => $totalAmount,
            'paid_amount'  => $paidAmount,
            'due_amount'   => $dueAmount,
            'status'       => $status,
        ]);
        $fees = Fee::where('group_id', $request->group_id)
            ->where('month', $request->month)
            ->get();
        foreach ($fees as $fee) {
            InvoiceItem::create([
                'invoice_id' => $invoice->id,
                'fee_head'   => $fee->feeHead->name,
                'amount'     => $fee->amount,
            ]);
        }
        return redirect()->route('invoice.show', $invoice->id);
    }
    public function managePayment()
    {
        $this->payment=StudentPayment::all();
        return view('account.studentpayment.managepayment',['payments'=>$this->payment]);
    }






}
