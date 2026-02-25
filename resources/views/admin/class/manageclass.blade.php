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
                        <h4 class="card-title">Classes</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Class</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                               @foreach($groups as $group)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$group->class}}</td>
                                        <td>
                                            <a href="{{route('editclass',['id'=>$group->id])}}" class="btn btn-primary">Edit</a>
                                            <a href="{{route('deleteclass',['id'=>$group->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                        </td>
                                    </tr>
                                   @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Classes</th>
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