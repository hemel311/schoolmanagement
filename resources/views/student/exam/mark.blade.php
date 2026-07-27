@extends('student.master')

@section('title')
    Student Marksheet
@endsection

@section('body')

    <div class="container mt-4">

        <div class="card shadow border-0">

            <div class="card-body">

                <!-- School Header -->
                <div class="text-center mb-4">
                    <h2 class="text-primary font-weight-bold">
                        YOUR SCHOOL NAME
                    </h2>
                    <h5 class="text-secondary">Academic Marksheet</h5>
                    <hr>
                </div>

                <!-- Student Information -->
                <div class="row mb-4">

                    <div class="col-md-6">

                        <table class="table table-borderless table-sm">

                            <tr>
                                <th width="150">Student Name</th>
                                <td>: {{ auth()->guard('student')->user()->name }}</td>
                            </tr>

                            <tr>
                                <th>Roll No</th>
                                <td>: {{ auth()->guard('student')->user()->rollno }}</td>
                            </tr>

                            <tr>
                                <th>Class</th>
                                <td>: {{ auth()->guard('student')->user()->group->class }}</td>
                            </tr>

                            <tr>
                                <th>Section</th>
                                <td>: {{ auth()->guard('student')->user()->section->section }}</td>
                            </tr>

                        </table>

                    </div>

                    <div class="col-md-6">

                        <table class="table table-borderless table-sm">

                            <tr>
                                <th width="150">Exam</th>
                                <td>: {{ strtoupper($exam_type->name) }}</td>
                            </tr>

                            <tr>
                                <th>Date</th>
                                <td>: {{ date('d M Y') }}</td>
                            </tr>

                        </table>

                    </div>

                </div>

            @php
                $total = 0;
                $subjectCount = $marks->count();
                $result = 'PASS';
            @endphp

            <!-- Mark Table -->
                <table class="table table-bordered table-hover text-center">

                    <thead class="table-primary">

                    <tr>
                        <th width="8%">SL</th>
                        <th width="42%">Subject</th>
                        <th width="20%">Marks</th>
                        <th width="15%">Grade</th>
                        <th width="15%">Remark</th>
                    </tr>

                    </thead>

                    <tbody>

                    @foreach($marks as $mark)

                        @php

                            $total += $mark->mark;

                            if($mark->mark >= 80){
                                $grade='A+';
                                $remark='Excellent';
                            }
                            elseif($mark->mark >= 70){
                                $grade='A';
                                $remark='Very Good';
                            }
                            elseif($mark->mark >= 60){
                                $grade='A-';
                                $remark='Good';
                            }
                            elseif($mark->mark >= 50){
                                $grade='B';
                                $remark='Average';
                            }
                            elseif($mark->mark >= 33){
                                $grade='C';
                                $remark='Pass';
                            }
                            else{
                                $grade='F';
                                $remark='Fail';
                                $result='FAIL';
                            }

                        @endphp

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td class="text-start">
                                {{ $mark->subject->subject }}
                            </td>

                            <td>
                                {{ $mark->mark }}
                            </td>

                            <td>

                                @if($grade=='A+')
                                    <span class="badge bg-success">{{ $grade }}</span>

                                @elseif($grade=='F')
                                    <span class="badge bg-danger">{{ $grade }}</span>

                                @else
                                    <span class="badge bg-primary">{{ $grade }}</span>

                                @endif

                            </td>

                            <td>{{ $remark }}</td>

                        </tr>

                    @endforeach

                    </tbody>

                    @php

                        $average = $subjectCount > 0 ? round($total / $subjectCount,2) : 0;

                        if($average >= 80){
                            $overallGrade='A+';
                        }
                        elseif($average >= 70){
                            $overallGrade='A';
                        }
                        elseif($average >= 60){
                            $overallGrade='A-';
                        }
                        elseif($average >= 50){
                            $overallGrade='B';
                        }
                        elseif($average >= 33){
                            $overallGrade='C';
                        }
                        else{
                            $overallGrade='F';
                        }

                    @endphp

                    <tfoot>

                    <tr class="table-secondary">

                        <th colspan="2">
                            Total Marks
                        </th>

                        <th>
                            {{ $total }}
                        </th>

                        <th colspan="2">
                            Average : {{ $average }}
                        </th>

                    </tr>

                    </tfoot>

                </table>

                <!-- Summary -->
                <div class="row mt-4">

                    <div class="col-md-4">

                        <div class="card bg-info text-white">

                            <div class="card-body text-center">

                                <h6>Total Marks</h6>

                                <h3>{{ $total }}</h3>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="card bg-warning">

                            <div class="card-body text-center">

                                <h6>Overall Grade</h6>

                                <h3>{{ $overallGrade }}</h3>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-4">

                        @if($result=='PASS')

                            <div class="card bg-success text-white">

                                <div class="card-body text-center">

                                    <h6>Result</h6>

                                    <h3>PASS</h3>

                                </div>

                            </div>

                        @else

                            <div class="card bg-danger text-white">

                                <div class="card-body text-center">

                                    <h6>Result</h6>

                                    <h3>FAIL</h3>

                                </div>

                            </div>

                        @endif

                    </div>

                </div>

                <!-- Signature -->
                <div class="row mt-5 text-center">

                    <div class="col-md-4">
                        <br><br>
                        ______________________
                        <br>
                        <strong>Class Teacher</strong>
                    </div>

                    <div class="col-md-4">
                        <br><br>
                        ______________________
                        <br>
                        <strong>Exam Controller</strong>
                    </div>

                    <div class="col-md-4">
                        <br><br>
                        ______________________
                        <br>
                        <strong>Principal</strong>
                    </div>

                </div>

                <div class="text-center mt-5">

                    <button class="btn btn-primary" onclick="window.print()">
                        <i class="fa fa-print"></i> Print Marksheet
                    </button>

                </div>

            </div>

        </div>

    </div>

@endsection