@extends("admin.master")
@section('title')
    Manage Class
@endsection
@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Exams</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Exam</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($exams as $exam)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$exam->name}}</td>
                                        <td>
                                            <a href="{{route('editexam',['id'=>$exam->id])}}" class="btn btn-primary">Edit</a>
                                            <a href="{{route('deleteexam',['id'=>$exam->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Name</th>
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