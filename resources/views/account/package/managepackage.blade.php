@extends("account.master")
@section('title')
    Manage Fees
@endsection
@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Fees</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Class</th>
                                    <th>Month</th>
                                    <th>Fee head</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($packages as $package)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $package->group->class }}</td>
                                        <td> {{ date('F', mktime(0, 0, 0, $package->month, 1)) }}</td>
                                        <td> {{$package->feeHead->name}}</td>
                                        <td> {{$package->amount}}</td>
                                        <td>
                                            <a href="{{route('editfees',['id'=>$package->id])}}" class="btn btn-primary">Edit</a>
                                            <a href="{{route('deletefees',['id'=>$package->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Class</th>
                                    <th>Month</th>
                                    <th>Fee head</th>
                                    <th>Amount</th>
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