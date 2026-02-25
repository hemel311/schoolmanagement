@extends("admin.master")
@section('title')
    Manage Addmission Officer
@endsection
@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Addmission Officer</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($accountants as $accountant)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $accountant->name }}</td>
                                        <td>{{ $accountant->email }}</td>
                                        <td>{{ $accountant->phone }}</td>
                                        <td><img src="{{asset($accountant->image)}}" alt="" width="100px" height="100px"></td>
                                        <td>
                                            <a href="{{route('editaccountant',['id'=>$accountant->id])}}" class="btn btn-primary">Edit</a>
                                            <a href="{{route('deleteaccountant',['id'=>$accountant->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Section</th>
                                    <th>Class</th>
                                    <th>Teacher</th>
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