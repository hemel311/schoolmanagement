@extends('addmissionofficer.master')
@section('title')
    Edit student
@endsection
@section('body')
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="page-heading my-4">
                <h1 class="page-titles">Edit Student</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=""><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item">Edit Student</li>
                </ol>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <a href="" class="btn btn-primary">Manage Student</a>
                    <h2 class="text-center">Edit Student</h2>
                </div>

                <div class="card-body">
                    <form action="{{route('updateStudent',['id'=>$student->id,'parentid'=>$student->parent_id])}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="card">
                            <div class="card-header bg-dark">
                                <h2 class="text-center text-light">Edit Student Details</h2>
                            </div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Class</label>
                                    <div class="col-md-8">
                                        <select name="group_id" class="form-control" onchange="getFee(this.value)">
                                            <option value="" selected>Select a Class</option>
                                            @foreach($classes as $class)
                                                <option value="{{ $class->id }}"
                                                        {{ $class->id == $student->group_id ? 'selected' : '' }}>
                                                    {{ $class->class }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Section</label>
                                    <div class="col-md-8">
                                        <select name="section_id" class="form-control">
                                            <option value="" selected>Select a Section</option>
                                            @foreach($sections as $section)
                                                <option value="{{ $section->id }}"
                                                        {{ $section->id == $student->section_id ? 'selected' : '' }}>
                                                    {{ $section->section }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Name</label>
                                    <div class="col-md-8">
                                        <input type="text" name="name" class="form-control" required value="{{$student->name}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Email</label>
                                    <div class="col-md-8">
                                        <input type="email" name="email" class="form-control" required value="{{$student->email}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">New Password</label>
                                    <div class="col-md-8">
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Confirm Password</label>
                                    <div class="col-md-8">
                                        <input type="password"  class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Date of Birth</label>
                                    <div class="col-md-8">
                                        <input type="date" name="dob" class="form-control" required value="{{$student->dob}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Present Address</label>
                                    <div class="col-md-8">
                                        <input type="text" name="present_address" class="form-control" required value="{{$student->present_address}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Permanent Address</label>
                                    <div class="col-md-8">
                                        <input type="text" name="permanent_address" class="form-control" required value="{{$student->permanent_address}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Image</label>
                                    <div class="col-md-8">
                                        <img src="{{asset($student->image)}}" alt="student Image" width="100px" height="100px">
                                        <input type="file" name="image" class="form-control" >
                                    </div>
                                </div>

                                <div class="card-header bg-dark">
                                    <h2 class="text-center text-light">Edit Parents Details</h2>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3">Father Name</label>
                                        <div class="col-md-8">
                                            <input type="text" name="father_name" class="form-control" required value="{{$student->parent->father_name}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3">Mother Name</label>
                                        <div class="col-md-8">
                                            <input type="text" name="mother_name" class="form-control" required value="{{$student->parent->mother_name}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3">Email</label>
                                        <div class="col-md-8">
                                            <input type="email" name="parent_email" class="form-control" required value="{{$student->parent->parent_email}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3"> New Password</label>
                                        <div class="col-md-8">
                                            <input type="password" name="parent_password" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3"> Confirm Password</label>
                                        <div class="col-md-8">
                                            <input type="password" name="parent_password" class="form-control" >
                                        </div>
                                    </div>
                                </div>


                                {{--<div class="card-header bg-dark">--}}
                                    {{--<h2 class="text-center text-light">Edit Payment Information</h2>--}}
                                {{--</div>--}}
                                {{--<div class="card-body">--}}
                                    {{--<div class="form-group row">--}}
                                        {{--<label class="col-form-label col-md-3">Total Amount</label>--}}
                                        {{--<div class="col-md-8">--}}
                                            {{--<input type="text" name="total_amount" id="total_amount" class="form-control" readonly>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="form-group row">--}}
                                        {{--<label class="col-form-label col-md-3">Paid Amount</label>--}}
                                        {{--<div class="col-md-8">--}}
                                            {{--<input type="text" name="paid_amount" id="paid_amount" class="form-control" onkeyup="calculateDue()">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="form-group row">--}}
                                        {{--<label class="col-form-label col-md-3">Due Amount</label>--}}
                                        {{--<div class="col-md-8">--}}
                                            {{--<input type="text" name="due_amount" id="due_amount" class="form-control" readonly>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                <div class="form-group row">
                                    <div class="col-md-8 offset-md-3">
                                        <input type="submit" value="Update student" class="btn btn-outline-success">
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
        function getFee(classId) {
            fetch('/get-class-fee/' + classId)
                .then(res => res.text())
                .then(total => {
                    document.getElementById('total_amount').value = total;
                    calculateDue();
                });
        }

        function calculateDue() {
            let total = document.getElementById('total_amount').value || 0;
            let paid = document.getElementById('paid_amount').value || 0;
            document.getElementById('due_amount').value = total - paid;
        }
    </script>
@endsection
