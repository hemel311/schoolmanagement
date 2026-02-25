@extends('admin.master')
@section('title')
    Add Addmission Officer || School Management system
@endsection

@section('body')
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="page-heading my-4">
                <h1 class="page-titles">Add Addmission Officer</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=""><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item">Add Addmission Officer</li>
                </ol>
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <a href="" class="btn btn-primary">Manage Addmission Officer</a>
                    <h2 class="text-center">Add Addmission Officer</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('updateaddmissionofficer',['id'=>$addmissionofficer->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header bg-dark">
                                <h2 class="text-center text-light">Add Addmission Officer</h2>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Name</label>
                                    <div class="col-md-8">
                                        <input type="text" name="name" class="form-control" required value="{{$addmissionofficer->name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Email</label>
                                    <div class="col-md-8">
                                        <input type="email" name="email" class="form-control" required value="{{$addmissionofficer->email}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3" for="">New Password <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="password" name="password" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3" for="">Confirm password <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="password" name="password_confirmation" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Phone</label>
                                    <div class="col-md-8">
                                        <input type="text" name="phone" class="form-control" required value="{{$addmissionofficer->phone}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Image</label>
                                    <div class="col-md-8">
                                        <img src="{{asset($addmissionofficer->image)}}" alt="" width="100px" height="100px">
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <input type="submit" value="Update Addmission Officer" class="btn btn-outline-success">
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