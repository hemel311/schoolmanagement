@extends("admin.master")
@section('title')
    Manage Teacher
@endsection
@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Teacher</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Education Qualification</th>
                                    <th>Subject</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($teachers as $teacher)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$teacher->name}}</td>
                                        <td>{{$teacher->email}}</td>
                                        <td>{{$teacher->education}}</td>
                                        <td>{{$teacher->subject}}</td>
                                        <td><img src="{{asset($teacher->image)}}" alt="{{$teacher->name}}" width="100px" height="100px"></td>
                                        <td>
                                            <a href="{{route('edit',['id'=>$teacher->id])}}" class="btn btn-primary">Edit email or Password</a>
                                            <a href="{{route('delete',['id'=>$teacher->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Education Qualification</th>
                                    <th>Subject</th>
                                    <th>Image</th>
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