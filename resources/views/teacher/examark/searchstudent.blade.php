@extends('teacher.master')
@section('title')
    Student Details search
@endsection
@section('body')
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h2>Search Student Details</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('getstudent') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label>Student Roll</label>
                            <input type="text" name="rollnumber" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Exam</label>
                            <select name="exam_type" class="form-control" required>
                                @foreach($exams as $exam)
                                    <option value="{{ $exam->id }}">
                                        {{ $exam->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button class="btn btn-primary">
                            Search
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection