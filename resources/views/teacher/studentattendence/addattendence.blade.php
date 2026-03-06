@extends('teacher.master')

@section('body')

    <div class="container">

        <h3>Student Attendance - {{ date('d M Y') }}</h3>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        <form action="{{route('update-attendence')}}" method="POST">

            @csrf

            <input type="hidden" name="section_id" value="{{ $section->id }}">

            <table class="table table-bordered">

                <thead>
                <tr>

                    <th>Roll</th>
                    <th>Name</th>
                    <th>Attendance</th>

                </tr>
                </thead>

                <tbody>

                @foreach($students as $student)

                    <tr>

                        <td>{{ $student->rollno }}</td>

                        <td>{{ $student->name }}</td>

                        <td>

                            <label>
                                <input type="radio"
                                       name="attendance[{{ $student->id }}]"
                                       value="present"
                                       checked> Present
                            </label>

                            <label style="margin-left:10px;">
                                <input type="radio"
                                       name="attendance[{{ $student->id }}]"
                                       value="absent"> Absent
                            </label>

                            <label style="margin-left:10px;">
                                <input type="radio"
                                       name="attendance[{{ $student->id }}]"
                                       value="late"> Late
                            </label>

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

            <button type="submit" class="btn btn-primary">
                Save Attendance
            </button>

        </form>

    </div>

@endsection