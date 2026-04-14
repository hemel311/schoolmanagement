@extends("teacher.master")
@section('title')
    Manage Class schedule
@endsection
@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Manage Class Schedule</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th>Subject</th>
                                    <th>Time</th>
                                    <th>Platform</th>
                                    <th>Link</th>
                                    <th>Action</th>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach($schedules as $schedule)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$schedule->group->class}}</td>
                                        <td>{{$schedule->section->section}}</td>
                                        <td>{{$schedule->subject}}</td>
                                        <td>{{$schedule->time}}</td>
                                        <td>{{$schedule->platform}}</td>
                                        <td><a href="{{$schedule->link}}" class="btn btn-outline-primary">Join Class</a></td>
                                        <td>
                                            <a href="{{route('editonlineclass',['id'=>$schedule->id])}}" class="btn btn-warning">Edit</a>
                                            <a href="{{route('deleteonlineclass',['id'=>$schedule->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                        </td>

                                    </tr>

                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th>Subject</th>
                                    <th>Time</th>
                                    <th>Platform</th>
                                    <th>Link</th>
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