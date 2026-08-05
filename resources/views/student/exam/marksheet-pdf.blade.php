<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <style>

        @page{
            margin:20px;
        }

        body{
            font-family: DejaVu Sans, sans-serif;
            font-size:12px;
            color:#000;
            margin:0;
            padding:0;
        }

        .header{
            text-align:center;
            border-bottom:2px solid #000;
            padding-bottom:10px;
            margin-bottom:20px;
        }

        .logo{
            width:70px;
            height:70px;
            margin-bottom:5px;
        }

        .school-name{
            font-size:24px;
            font-weight:bold;
        }

        .school-address{
            font-size:12px;
            margin-top:3px;
        }

        .title{
            margin-top:15px;
            font-size:18px;
            font-weight:bold;
            text-decoration:underline;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        .info-table td{
            border:none;
            padding:4px;
            font-size:12px;
        }

        .mark-table{
            margin-top:20px;
        }

        .mark-table th{
            border:1px solid #000;
            padding:8px;
            background:#efefef;
            font-size:12px;
        }

        .mark-table td{
            border:1px solid #000;
            padding:7px;
            text-align:center;
        }

        .left{
            text-align:left;
        }

        .right{
            text-align:right;
        }

        .center{
            text-align:center;
        }

        .summary{
            margin-top:20px;
        }

        .summary td{
            border:1px solid #000;
            padding:8px;
        }

        .signature{
            margin-top:80px;
        }

        .signature td{
            border:none;
            text-align:center;
            width:33%;
        }

        .line{
            margin-top:40px;
            border-top:1px solid #000;
            width:160px;
            margin-left:auto;
            margin-right:auto;
        }

        .footer{
            position:fixed;
            bottom:0;
            left:0;
            right:0;
            text-align:center;
            font-size:10px;
        }

    </style>

</head>

<body>

<div class="header">

    {{-- School Logo --}}
    {{-- <img src="{{ public_path('logo.png') }}" class="logo"> --}}

    <div class="school-name">
        YOUR SCHOOL NAME
    </div>

    <div class="school-address">
        School Address<br>
        Phone : 0123456789
    </div>

    <div class="title">
        Academic Marksheet
    </div>

</div>

<table class="info-table">

    <tr>

        <td width="25%">
            <strong>Student Name</strong>
        </td>

        <td width="25%">
            : {{ auth()->guard('student')->user()->name }}
        </td>

        <td width="20%">
            <strong>Roll No</strong>
        </td>

        <td width="30%">
            : {{ auth()->guard('student')->user()->rollno }}
        </td>

    </tr>

    <tr>

        <td>
            <strong>Class</strong>
        </td>

        <td>
            : {{ auth()->guard('student')->user()->group->class }}
        </td>

        <td>
            <strong>Section</strong>
        </td>

        <td>
            : {{ auth()->guard('student')->user()->section->section }}
        </td>

    </tr>

    <tr>

        <td>
            <strong>Exam</strong>
        </td>

        <td>
            : {{ strtoupper($exam_type->name) }}
        </td>

        <td>
            <strong>Date</strong>
        </td>

        <td>
            : {{ date('d M Y') }}
        </td>

    </tr>

</table>

@php

    $total = 0;
    $totalPoint = 0;
    $result = 'PASS';
    $subjectCount = $marks->count();

@endphp

{{-- =========================
     MARKS TABLE
========================= --}}

<table class="mark-table">

    <thead>

    <tr>
        <th width="8%">SL</th>
        <th width="38%">Subject</th>
        <th width="12%">Marks</th>
        <th width="12%">Grade</th>
        <th width="15%">Point</th>
    </tr>

    </thead>

    <tbody>

    @foreach($marks as $mark)

        @php

            $total += $mark->mark;

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

            <td class="left">
                {{ $mark->subject->subject }}
            </td>

            <td>{{ $mark->mark }}</td>

            <td>{{ $grade }}</td>

            <td>{{ number_format($point,2) }}</td>


        </tr>

    @endforeach

    </tbody>

</table>

@php

    $average = $subjectCount
        ? round($total / $subjectCount,2)
        : 0;

    $gpa = $subjectCount
        ? round($totalPoint / $subjectCount,2)
        : 0;

    if($result=='FAIL'){
        $gpa = 0.00;
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

{{-- =========================
     SUMMARY
========================= --}}

<table class="summary">

    <tr>

        <td width="50%">
            <strong>Total Marks</strong>
        </td>

        <td width="50%">
            {{ $total }}
        </td>

    </tr>

    <tr>

        <td>
            <strong>Average Marks</strong>
        </td>

        <td>
            {{ number_format($average,2) }}
        </td>

    </tr>

    <tr>

        <td>
            <strong>Overall GPA</strong>
        </td>

        <td>
            {{ number_format($gpa,2) }} / 5.00
        </td>

    </tr>

    <tr>

        <td>
            <strong>Overall Grade</strong>
        </td>

        <td>
            {{ $overallGrade }}
        </td>

    </tr>

    <tr>

        <td>
            <strong>Final Result</strong>
        </td>

        <td>
            {{ $result }}
        </td>

    </tr>

</table>

{{-- =========================
     SIGNATURE SECTION
========================= --}}

<table class="signature">

    <tr>

        <td>
            <div class="line"></div>
            <strong>Class Teacher</strong>
        </td>

        <td>
            <div class="line"></div>
            <strong>Exam Controller</strong>
        </td>

        <td>
            <div class="line"></div>
            <strong>Principal</strong>
        </td>

    </tr>

</table>

<br><br>

<table style="width:100%;border:none;">

    <tr>

        <td style="border:none;font-size:11px;">
            Generated On :
            {{ now()->format('d M Y h:i A') }}
        </td>

        <td style="border:none;text-align:right;font-size:11px;">
            This is a computer generated marksheet.
        </td>

    </tr>

</table>

<div class="footer">
    © {{ date('Y') }} YOUR SCHOOL NAME. All Rights Reserved.
</div>

</body>
</html>