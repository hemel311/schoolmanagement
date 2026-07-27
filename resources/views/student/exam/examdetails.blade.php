@extends('student.master')
@section('title')
Select exam
@endsection
@section('body')
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h2>Search Student Details</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('marksdetails')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <select name="exam_type" id="" class="form-control">
                                <option value="" selected>Select a exam</option>
                                @foreach($exams as $exam)
                                    <option value="{{$exam->id}}">{{$exam->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <input type="submit" value="Submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection