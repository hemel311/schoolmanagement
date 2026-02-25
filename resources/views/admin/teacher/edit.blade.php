@extends('admin.master')
@section('title')
    Change email or Password
@endsection
@section('body')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="page-heading my-4">
                    <h1 class="page-title">Change email or password</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#"><i class="la la-home font-20"></i></a>
                        </li>
                        <li class="breadcrumb-item">Change email or password</li>
                    </ol>
                </div>

                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <a href="" class="btn btn-primary">Manage Teacher</a>
                        <h2 class="text-center">Change email or password</h2>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('update',['id'=>$teacher->id]) }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3" for="">Email <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="email" name="email" class="form-control" value="{{$teacher->email}}">
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
                                <label class="col-form-label col-lg-3" for=""></label>
                                <div class="col-lg-9">
                                    <input type="submit" class="btn btn-success" value="Update">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection