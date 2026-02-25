@extends('account.master')
@section('title')
    Edit Package
@endsection

@section('body')
    <div class="row">
        <div class="col-lg-10 mx-auto">

            <div class="page-heading my-4">
                <h1 class="page-titles">Edit Package</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href=""><i class="fa fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">Edit Package</li>
                </ol>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h2 class="text-center">Edit Package</h2>
                </div>

                <div class="card-body">
                    <form action="{{route('updatefee',['id'=>$fee->id])}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="card">
                            <div class="card-header bg-dark">
                                <h2 class="text-center text-light">Edit Package</h2>
                            </div>

                            <div class="card-body">

                                {{-- Class --}}
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Class</label>
                                    <div class="col-md-8">
                                        <select name="group_id" class="form-control">
                                            <option value="">Select a class</option>
                                            @foreach($classes as $class)
                                                <option value="{{ $class->id }}"
                                                        {{ old('group_id', $fee->group_id) == $class->id ? 'selected' : '' }}>
                                                    {{ $class->class }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- Month --}}
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Month</label>
                                    <div class="col-md-8">
                                        <select name="month" class="form-control">
                                            <option value="">Select a Month</option>
                                            @foreach(range(1,12) as $month)
                                                <option value="{{ $month }}"
                                                        {{ old('month', $fee->month) == $month ? 'selected' : '' }}>
                                                    {{ date('F', mktime(0,0,0,$month,1)) }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                {{-- Fee Head --}}
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Fee</label>
                                    <div class="col-md-8">
                                        <select name="fee_head_id" class="form-control">
                                            <option value="">Select a Fee</option>
                                            @foreach($feeshead as $feehead)
                                                <option value="{{ $feehead->id }}"
                                                        {{ old('fee_head_id', $fee->fee_head_id) == $feehead->id ? 'selected' : '' }}>
                                                    {{ $feehead->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- Amount --}}
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Amount</label>
                                    <div class="col-md-8">
                                        <input type="text" name="amount" class="form-control" required value="{{$fee->amount}}">
                                    </div>
                                </div>

                                {{-- Submit --}}
                                <div class="form-group row">
                                    <div class="col-md-8 offset-md-3">
                                        <input type="submit" value="Update Fee" class="btn btn-outline-success">
                                    </div>
                                </div>

                            </div> {{-- card-body --}}
                        </div> {{-- inner card --}}
                    </form>
                </div> {{-- outer card-body --}}
            </div> {{-- card --}}
        </div>
    </div>
@endsection
