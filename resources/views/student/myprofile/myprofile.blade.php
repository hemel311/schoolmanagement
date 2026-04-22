@extends('student.master')

@section('body')

    <div class="container mt-4">

        <!-- PROFILE HEADER -->
        <div class="card p-3 mb-3">
            <div class="row align-items-center">

                <div class="col-md-2 text-center">
                    <img src="{{ asset($student->image ?? 'default.png') }}"
                         class="img-fluid rounded-circle"
                         style="width:120px;height:120px;">
                </div>

                <div class="col-md-10">
                    <h4>{{ $student->name }}</h4>
                    <p>
                        Roll: {{ $student->rollno }} <br>
                        Class: {{ $student->group->class ?? '' }} |
                        Section: {{ $student->section->section ?? '' }}
                    </p>
                </div>

            </div>
        </div>

        <!-- TABS -->
        <ul class="nav nav-tabs mb-3">
            <li class="nav-item">
                <a class="nav-link active">Personal</a>
            </li>
        </ul>

        <!-- CONTACT INFO -->
        <div class="card p-3 mb-3">
            <h5>Contact Information</h5>

            <table class="table table-bordered mt-2">

                {{--<tr>--}}
                    {{--<th width="200">Mobile</th>--}}
                    {{--<td>--}}
                        {{--{{ $student->mobile ?? 'N/A' }}--}}
                        {{--<button class="btn btn-success btn-sm">Change</button>--}}
                    {{--</td>--}}
                {{--</tr>--}}

                <tr>
                    <th>Email</th>
                    <td>
                        {{ $student->email }}
                    </td>
                </tr>

                <tr>
                    <th>Present Address</th>
                    <td>{{ $student->present_address }}</td>
                </tr>

                <tr>
                    <th>Permanent Address</th>
                    <td>{{ $student->permanent_address }}</td>
                </tr>

            </table>
        </div>

        <!-- PERSONAL + PARENTS -->
        <div class="row">

            <!-- PERSONAL INFO -->
            <div class="col-md-6">
                <div class="card p-3">
                    <h5>Personal Information</h5>

                    <table class="table table-bordered mt-2">

                        <tr>
                            <th>Full Name</th>
                            <td>{{ $student->name }}</td>
                        </tr>

                        <tr>
                            <th>Date of Birth</th>
                            <td>{{ $student->dob }}</td>
                        </tr>

                    </table>
                </div>
            </div>

            <!-- PARENTS INFO -->
            <div class="col-md-6">
                <div class="card p-3">
                    <h5>Parents Information</h5>

                    <table class="table table-bordered mt-2">

                        <tr>
                            <th>Father Name</th>
                            <td>{{ $student->parent->father_name ?? '' }}</td>
                        </tr>

                        <tr>
                            <th>Mother Name</th>
                            <td>{{ $student->parent->mother_name ?? '' }}</td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td>{{ $student->parent->parent_email ?? '' }}</td>
                        </tr>

                        <tr>
                            <th>Contact</th>
                            <td>{{ $student->parent->mobile ?? 'N/A' }}</td>
                        </tr>

                    </table>
                </div>
            </div>

        </div>

    </div>

@endsection