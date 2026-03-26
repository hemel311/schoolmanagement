@extends('teacher.master')
@section('title')
    Add Material || School Management system
@endsection

@section('body')
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="page-heading my-4">
                <h1 class="page-titles">Add Material</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=""><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item">Add Material</li>
                </ol>
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <a href="" class="btn btn-primary">Manage Material</a>
                    <h2 class="text-center">Add Class</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('uploadmaterial')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header bg-dark">
                                <h2 class="text-center text-light">Add material</h2>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Class</label>
                                    <div class="col-md-8">
                                        <select name="group_id" id="group_id" class="form-control">
                                            <option value="">Select a class</option>
                                            @foreach($groups as $group)
                                                <option value="{{ $group->id }}">{{ $group->class }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Section</label>
                                    <div class="col-md-8">
                                        <select name="section_id" id="section_id" class="form-control">
                                            <option value="">Select a section</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Title</label>
                                    <div class="col-md-8">
                                        <input type="text" name="title" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Description</label>
                                    <div class="col-md-8">
                                        <textarea name="description" id="" cols="30" rows="10" >

                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Description</label>
                                    <div class="col-md-8">
                                        <input type="file" name="file" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <input type="submit" value="Add Material" class="btn btn-outline-success">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {

            $('#group_id').on('change', function () {
                let group_id = $(this).val();

                if (group_id) {
                    $.ajax({
                        url: "{{ route('get.sections') }}",
                        type: "GET",
                        data: { group_id: group_id },
                        success: function (data) {
                            $('#section_id').empty();
                            $('#section_id').append('<option value="">Select Section</option>');

                            $.each(data, function (key, section) {
                                $('#section_id').append(
                                    '<option value="' + section.id + '">' + section.section + '</option>'
                                );
                            });
                        }
                    });
                } else {
                    $('#section_id').empty();
                }
            });

        });
    </script>
@endsection