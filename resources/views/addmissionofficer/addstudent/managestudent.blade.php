@extends("addmissionofficer.master")
@section('title')
    Manage Student
@endsection
@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Manage Student</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Name</th>
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td> {{$student->group->class}}</td>
                                        <td> {{$student->section->section}}</td>
                                        <td>
                                            <a href="{{route('editstudent',['id'=>$student->id])}}" class="btn btn-primary">Edit student</a>
                                            <a href="{{route('deletestudent',['id'=>$student->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Name</th>
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection