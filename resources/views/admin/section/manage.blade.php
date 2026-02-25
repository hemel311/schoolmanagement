@extends("admin.master")
@section('title')
    Manage Section
@endsection
@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Section</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Section</th>
                                    <th>Class</th>
                                    <th>Teacher</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sections as $section)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $section->section }}</td>
                                        <td>{{ $section->group->class }}</td>
                                        <td>{{ $section->classTeacher->name ?? 'No Teacher Assigned' }}</td>
                                        <td>
                                            <a href="{{route('editsection',['id'=>$section->id])}}" class="btn btn-primary">Edit</a>
                                            <a href="{{route('deletesection',['id'=>$section->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
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