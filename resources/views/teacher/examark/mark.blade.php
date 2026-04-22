@extends('teacher.master')

@section('body')
    <div class="container">
        <h2>Enter Marks</h2>

        <div class="card mb-3">
            <div class="card-body">
                <strong>Student Name:</strong> {{ $student->name }} <br>
                <strong>Roll:</strong> {{ $student->rollno }} <br>
                <strong>Class:</strong> {{ $student->group->class ?? '' }}


            </div>
        </div>

        <form action="{{route('storemark')}}" method="POST">
            @csrf

            <input type="hidden" name="student_id" value="{{ $student->id }}">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Exam Type</th>
                    <th>
                        <select name="exam_type" id="" class="form-control">
                            @foreach($exams as $exam)
                            <option value="{{$exam->id}}">{{$exam->name}}</option>
                            @endforeach
                        </select>
                    </th>
                </tr>
                <tr>
                    <th>Subject Name</th>
                    <th>Marks</th>
                </tr>
                </thead>
                <tbody>
                @foreach($subjects as $subject)
                    <tr>
                        <!-- Readonly Subject Name -->
                        <td>
                            <input type="text" class="form-control"
                                   value="{{ $subject->subject }}" readonly>
                        </td>

                        <!-- Marks Input Field -->
                        <td>
                            <input type="number"
                                   name="marks[{{ $subject->id }}]"
                                   class="form-control"
                                   placeholder="Enter Marks" required>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <button type="submit" class="btn btn-success">Submit Marks</button>
        </form>
    </div>
@endsection