@extends("student.master")
@section('title')
    Payment details
@endsection
@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> Payment details</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Invoice NO</th>
                                    <th>Month</th>
                                    <th>Total Amount</th>
                                    <th>Paid Amount</th>
                                    <th>Due Amount</th>
                                    <th>Status</th>
                                    <th>Download invoice</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($fees as $fee)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$fee->invoice_no}}</td>
                                        <td>
                                            {{ date('F', mktime(0,0,0,$fee->month,1)) }}
                                        </td>
                                        <td>{{$fee->total_amount}}</td>
                                        <td>{{$fee->paid_amount}}</td>
                                        <td>{{$fee->due_amount}}</td>
                                        <td>
                                            @if($fee->status == 'paid')
                                                <span class="badge badge-success text-white">✔ Paid</span>
                                            @else
                                                <span class="badge badge-danger text-white">✘ Due</span>
                                            @endif
                                        </td>
                                        <td><a href="{{route('student.invoice.show',['id'=>$fee->id])}}" class="btn btn-outline-primary">Download invoice</a></td>
                                    </tr>

                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Invoice NO</th>
                                    <th>Month</th>
                                    <th>Total Amount</th>
                                    <th>Paid Amount</th>
                                    <th>Due Amount</th>
                                    <th>Status</th>
                                    <th>Download invoice</th>

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