@extends("account.master")
@section('title')
    Manage Student Payment
@endsection
@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Manage Student Payment</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Name</th>
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th>Month</th>
                                    <th>Total Amount</th>
                                    <th>Paid Amount</th>
                                    <th>Due Amount</th>
                                    <th>Status</th>

                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($payments as $payment)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $payment->student->name }}</td>
                                            <td>{{ $payment->student->group->class }}</td>
                                            <td>{{ $payment->student->section->section }}</td>
                                            <td>{{ date('F', mktime(0, 0, 0, $payment->month, 1)) }}</td>
                                            <td>{{ $payment->total_amount }}</td>
                                            <td>{{ $payment->paid_amount }}</td>
                                            <td>{{ $payment->due_amount }}</td>
                                            <td class="{{ $payment->status == 'paid' ? 'bg-success text-white' : 'bg-danger text-white' }}">
                                                {{$payment->status}}
                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Name</th>
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th>Month</th>
                                    <th>Total Amount</th>
                                    <th>Paid Amount</th>
                                    <th>Due Amount</th>
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