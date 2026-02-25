@extends('teacher.master')
@section('title')
    Student Details
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-light">
                    <h3 class="mb-0 text-center">Student Details</h3>
                </div>

                <div class="card-body">
                    <div class="row">

                        <!-- Student Photo -->
                        <div class="col-md-4 text-center border-end">
                            <img src="{{ asset($student->image) }}"
                                 alt="Student Image"
                                 class="img-fluid rounded-circle mb-3"
                                 style="height:150px;width:150px;object-fit:cover;">

                            <h4 class="fw-bold">{{ $student->name }}</h4>
                            <p class="text-muted mb-0">
                                Class: {{ $student->group->class ?? 'N/A' }}
                            </p>
                            <p class="text-muted">
                                Section: {{ $student->section->section ?? 'N/A' }}
                            </p>
                        </div>

                        <!-- Student Information -->
                        <div class="col-md-8">
                            <h4 class="mb-3 border-bottom pb-2">Student Information</h4>

                            <div class="row mb-2">
                                <div class="col-md-4 fw-bold">Full Name:</div>
                                <div class="col-md-8">{{ $student->name }}</div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4 fw-bold">Roll:</div>
                                <div class="col-md-8">{{ $student->rollno ?? 'N/A' }}</div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4 fw-bold">Class:</div>
                                <div class="col-md-8">{{ $student->group->class ?? 'N/A' }}</div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4 fw-bold">Section:</div>
                                <div class="col-md-8">{{ $student->section->section ?? 'N/A' }}</div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4 fw-bold">Result (GPA):</div>
                                <div class="col-md-8">
                                <span class="badge bg-success">
                                    {{--{{ $student->result ?? 'Not Published' }}--}}
                                </span>
                                </div>
                            </div>

                            <hr>

                            <!-- Parents Information -->
                            <h4 class="mb-3 border-bottom pb-2">Parents Information</h4>

                            <div class="row mb-2">
                                <div class="col-md-4 fw-bold">Father's Name:</div>
                                <div class="col-md-8">
                                    {{ $student->parent->father_name ?? 'N/A' }}
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4 fw-bold">Mother's Name:</div>
                                <div class="col-md-8">
                                    {{ $student->parent->mother_name ?? 'N/A' }}
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4 fw-bold">Parent Phone:</div>
                                <div class="col-md-8">
                                    {{ $student->parent_phone ?? 'N/A' }}
                                </div>


                            <div class="row mb-2">
                                <div class="col-md-5 fw-bold">Address:</div>
                                <div class="col-md-7">
                                    {{ $student->present_address ?? 'N/A' }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card-footer text-end">
                    <a href="" class="btn btn-secondary">
                        Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection