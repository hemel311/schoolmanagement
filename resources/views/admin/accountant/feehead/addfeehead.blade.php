@extends('admin.master')
@section('title')
    Add Feehead || School Management system
@endsection

@section('body')
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="page-heading my-4">
                <h1 class="page-titles">Add Feehead</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=""><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item">Add Fee head</li>
                </ol>
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h2 class="text-center">Add Fee head</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('createfeehead')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header bg-dark">
                                <h2 class="text-center text-light">Add Fee head</h2>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Name</label>
                                    <div class="col-md-8">
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <input type="submit" value="Add Fee Head" class="btn btn-outline-success">
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