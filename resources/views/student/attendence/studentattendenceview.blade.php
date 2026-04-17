@extends("student.master")
@section('title')
    Attendece
@endsection
@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> Attendece</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($attendences as $attendence)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ \Carbon\Carbon::parse($attendence->date)->format('l,d M Y') }}</td>
                                        <td>
                                            @if($attendence->status == 'present')
                                                <span class="badge badge-success">✔ Present</span>
                                            @else
                                                <span class="badge badge-danger">✘ Absent</span>
                                            @endif
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Date</th>
                                    <th>Status</th>

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