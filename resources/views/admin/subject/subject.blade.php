@extends('admin.master')
@section('title')
    Add Subject || School Management system
@endsection

@section('body')
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="page-heading my-4">
                <h1 class="page-titles">Add Subject</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=""><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item">Add Subject</li>
                </ol>
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <a href="" class="btn btn-primary">Manage subject</a>
                    <h2 class="text-center">Add Class</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('createsubject')}}" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-header bg-dark">
                                <h2 class="text-center text-light">Add subject</h2>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Subject Name</label>
                                    <div class="col-md-8">
                                        <select name="group_id" id="" class="form-control">
                                            <option value="" selected>Select a class</option>
                                            @foreach($groups as $group)
                                                <option value="{{$group->id}}" selected>{{$group->class}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Subject Name</label>
                                    <div class="col-md-8">
                                        <input type="text" name="subject" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <input type="submit" value="Add Subject" class="btn btn-outline-success">
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