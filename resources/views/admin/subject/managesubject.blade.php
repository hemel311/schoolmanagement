@extends("admin.master")
@section('title')
    Manage Subjects
@endsection
@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Subjects</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Class</th>
                                    <th>Subjects</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subjects as $subject)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$subject->group->class}}</td>
                                        <td>{{$subject->subject}}</td>
                                        <td>
                                            <a href="" class="btn btn-primary">Edit</a>
                                            <a href="" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Classes</th>
                                    <th>Subjects</th>
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