@extends('account.master')
@section('title')
    Student Payment Deteails||School management
@endsection
@section('body')
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h2>Search Student payment Details</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('studentpaymentdetails')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="text" name="rollnumber" class="form-control" placeholder="Enter Student Rollnumber">
                            </div>
                            <input type="submit" value="Search" class="btn btn-primary">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection