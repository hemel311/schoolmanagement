@extends('account.master')
@section('title')
    Add student payment
@endsection
@section('body')
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="page-heading my-4">
                <h1 class="page-titles">Add student payment</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=""><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item">Add student payment</li>
                </ol>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <a href="" class="btn btn-primary">Manage Student payment</a>
                    <h2 class="text-center">Add student paymentt</h2>
                </div>

                <div class="card-body">
                    <form action="{{route('createpayment')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="student_id" value="{{ $students->id }}">
                        <input type="hidden" name="rollno" value="{{ $students->rollno }}">
                        <input type="hidden" name="group_id" value="{{ $students->group_id }}">
                        <div class="card">
                            <div class="card-header bg-dark">
                                <h2 class="text-center text-light">Add Student Details</h2>
                            </div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Class</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" readonly value="{{$students->group->class}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Section</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" readonly value="{{$students->section->section}}">
                                    </div>
                                </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3">Name</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" readonly value="{{$students->name}}">
                                        </div>
                                    </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Month</label>
                                    <div class="col-md-8">
                                        <select name="month" class="form-control"
                                                onchange="getFee({{ $students->group_id }}, this.value)">
                                            <option value="">Select a Month</option>
                                            @foreach(range(1,12) as $month)
                                                <option value="{{ $month }}">
                                                    {{ date('F', mktime(0,0,0,$month,1)) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Total Amount</label>
                                    <div class="col-md-8">
                                        <input type="text" name="total_amount" id="total_amount" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Paid Amount</label>
                                    <div class="col-md-8">
                                        <input type="text" name="paid_amount" id="paid_amount" class="form-control" onkeyup="calculateDue()">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Due Amount</label>
                                    <div class="col-md-8">
                                        <input type="text" name="due_amount" id="due_amount" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                                <div class="form-group row">
                                    <div class="col-md-8 offset-md-3">
                                        <input type="submit" value="Add Payment" class="btn btn-outline-success">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function getFee(classId, month) {
            if (!month) return;

            fetch(`/account/get-monthly-fee/${classId}/${month}`)
                .then(res => res.json())
                .then(data => {
                    document.getElementById('total_amount').value = data.amount;
                    calculateDue();
                });
        }

        function calculateDue() {
            let total = parseFloat(document.getElementById('total_amount').value) || 0;
            let paid  = parseFloat(document.getElementById('paid_amount').value) || 0;
            document.getElementById('due_amount').value = total - paid;
        }
    </script>
@endsection
