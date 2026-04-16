@extends("student.master")
@section('title')
    Class schedule
@endsection
@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> Class Schedule</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Subject</th>
                                    <th>Teacher</th>
                                    <th>Time</th>
                                    <th>Platform</th>
                                    <th>Link</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($schedules as $schedule)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$schedule->subject}}</td>
                                        <td>{{$schedule->teacher->name}}</td>
                                        <td>{{$schedule->time}}</td>
                                        <td>{{$schedule->platform}}</td>
                                        <td><a href="{{$schedule->link}}" class="btn btn-outline-primary">Join Class</a></td>
                                    </tr>

                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Subject</th>
                                    <th>Teacher</th>
                                    <th>Time</th>
                                    <th>Platform</th>
                                    <th>Link</th>

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