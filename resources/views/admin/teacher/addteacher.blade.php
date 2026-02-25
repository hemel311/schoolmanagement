@extends('admin.master')
@section('title')
    Add Teacher || School Management system
@endsection

@section('body')
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="page-heading my-4">
                <h1 class="page-titles">Add Teacher</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=""><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item">Add Teacher</li>
                </ol>
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <a href="" class="btn btn-primary">Manage Teacher</a>
                    <h2 class="text-center">Add Teacher</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('createteacher')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header bg-dark">
                                <h2 class="text-center text-light">Add Teacher</h2>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Name</label>
                                    <div class="col-md-8">
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Email</label>
                                    <div class="col-md-8">
                                        <input type="email" name="email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Password</label>
                                    <div class="col-md-8">
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Phone</label>
                                    <div class="col-md-8">
                                        <input type="text" name="phone" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Education Qualification</label>
                                    <div class="col-md-8">
                                        <input type="text" name="education" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Subject</label>
                                    <div class="col-md-8">
                                        <input type="text" name="subject" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Address</label>
                                    <div class="col-md-8">
                                        <input type="text" name="address" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Joining date</label>
                                    <div class="col-md-8">
                                        <input type="date" name="date" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Teacher Image</label>
                                    <div class="col-md-8">
                                        <input type="file" name="image" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <input type="submit" value="Add Class" class="btn btn-outline-success">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection