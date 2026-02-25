@extends('admin.master')
@section('title')
    Add Section || School Management system
@endsection

@section('body')
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="page-heading my-4">
                <h1 class="page-titles">Edit Section</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=""><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item">Edit Section</li>
                </ol>
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <a href="" class="btn btn-primary">Manage Section</a>
                    <h2 class="text-center">Edit Section</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('update',['id'=>$section->id])}}" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-header bg-dark">
                                <h2 class="text-center text-light">Edit Section</h2>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Class</label>
                                    <div class="col-md-8">
                                        <select name="class_id" class="form-control" required>
                                            <option value="">Select a Class</option>
                                            @foreach($classes as $class)
                                                <option value="{{ $class->id }}"
                                                        {{ $class->id == $section->class_id ? 'selected' : '' }}>
                                                    {{ $class->class }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Section</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="section" value="{{$section->section}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Class teacher</label>
                                    <div class="col-md-8">
                                        <select name="class_teacher_id" class="form-control">
                                            <option value="">Select a class teacher</option>

                                            @foreach($teachers as $teacher)
                                                <option value="{{ $teacher->id }}"
                                                        {{ $teacher->id == $section->class_teacher_id ? 'selected' : '' }}>
                                                    {{ $teacher->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <input type="submit" value="Edit Section" class="btn btn-outline-success">
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