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
                        <th width="35%">Subject</th>
                        <th width="15%">Marks</th>
                        <th width="15%">Grade</th>
                        <th width="12%">GPA</th>
                        <th width="15%">Remark</th>
                    </tr>

                    </thead>

                    <tbody>

                    @foreach($marks as $mark)

                        @php

                            $total += $mark->mark;

                            if(!isset($totalPoint)){
                                $totalPoint = 0;
                            }

                            if($mark->mark >= 80){
                                $grade='A+';
                                $point=5.00;
                                $remark='Excellent';
                            }
                            elseif($mark->mark >= 70){
                                $grade='A';
                                $point=4.00;
                                $remark='Very Good';
                            }
                            elseif($mark->mark >= 60){
                                $grade='A-';
                                $point=3.50;
                                $remark='Good';
                            }
                            elseif($mark->mark >= 50){
                                $grade='B';
                                $point=3.00;
                                $remark='Average';
                            }
                            elseif($mark->mark >= 40){
                                $grade='C';
                                $point=2.00;
                                $remark='Satisfactory';
                            }
                            elseif($mark->mark >= 33){
                                $grade='D';
                                $point=1.00;
                                $remark='Pass';
                            }
                            else{
                                $grade='F';
                                $point=0.00;
                                $remark='Fail';
                                $result='FAIL';
                            }

                            $totalPoint += $point;

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
                                    <span class="badge bg-success text-white">{{ $grade }}</span>

                                @elseif($grade=='F')
                                    <span class="badge bg-danger text-white">{{ $grade }}</span>

                                @else
                                    <span class="badge bg-primary text-white">{{ $grade }}</span>

                                @endif

                            </td>

                            <td>{{ number_format($point,2) }}</td>
                            <td>{{ $remark }}</td>

                        </tr>

                    @endforeach

                    </tbody>

                    @php

                        $average = $subjectCount > 0 ? round($total/$subjectCount,2) : 0;

                        $gpa = $subjectCount > 0 ? round($totalPoint/$subjectCount,2) : 0;

                        if($result=='FAIL'){
                            $gpa=0.00;
                        }

                        if($gpa==5.00){
                            $overallGrade='A+';
                        }
                        elseif($gpa>=4.00){
                            $overallGrade='A';
                        }
                        elseif($gpa>=3.50){
                            $overallGrade='A-';
                        }
                        elseif($gpa>=3.00){
                            $overallGrade='B';
                        }
                        elseif($gpa>=2.00){
                            $overallGrade='C';
                        }
                        elseif($gpa>=1.00){
                            $overallGrade='D';
                        }
                        else{
                            $overallGrade='F';
                        }

                    @endphp

                    <tfoot>

                    <tr class="table-dark">

                        <th colspan="2" class="text-end">
                            Total Marks
                        </th>

                        <th>
                            {{ $total }}
                        </th>

                        <th>
                            {{ $overallGrade }}
                        </th>

                        <th>
                            {{ number_format($gpa,2) }}
                        </th>

                        <th>
                            Avg: {{ $average }}
                        </th>

                    </tr>

                    </tfoot>

                </table>

                <!-- Summary -->
                <div class="row mt-4">

                    <div class="col-md-3">

                        <div class="card bg-primary text-white shadow">

                            <div class="card-body text-center">

                                <h6>Total Marks</h6>

                                <h3>{{ $total }}</h3>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="card bg-info text-white shadow">

                            <div class="card-body text-center">

                                <h6>Average</h6>

                                <h3>{{ $average }}</h3>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="card bg-warning shadow">

                            <div class="card-body text-center">

                                <h6>GPA</h6>

                                <h3>{{ number_format($gpa,2) }}</h3>

                                <small>Out of 5.00</small>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-3">

                        @if($result=='PASS')

                            <div class="card bg-success text-white shadow">

                                <div class="card-body text-center">

                                    <h6>Result</h6>

                                    <h3>PASS</h3>

                                    <small>{{ $overallGrade }}</small>

                                </div>

                            </div>

                        @else

                            <div class="card bg-danger text-white shadow">

                                <div class="card-body text-center">

                                    <h6>Result</h6>

                                    <h3>FAIL</h3>

                                    <small>GPA : 0.00</small>

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

                    <a
                            href="{{ route('student.marksheet.pdf',$exam_type->id) }}"
                            target="_blank"
                            class="btn btn-danger">

                        <i class="fa fa-file-pdf"></i>

                        Generate PDF

                    </a>

                </div>

            </div>

        </div>

    </div>

@endsection