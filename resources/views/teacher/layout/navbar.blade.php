@php
    $hasSection = \App\Models\Section::where('class_teacher_id', \Illuminate\Support\Facades\Auth::guard('teacher')->id())->exists();
@endphp
<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-graduation menu-icon"></i><span class="nav-text">Students</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('teacher.studentdetails.search')}}">Student Details</a></li>
                </ul>
            </li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-basic-spread-bookmark menu-icon"></i><span class="nav-text">Class Routine</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="./layout-blank.html">My classes</a></li>
                </ul>
            </li>
            @if($hasSection)
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Exam Details</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('searchstudent')}}">Give mark</a></li>
                </ul>
            </li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Attendence</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('add-attendence')}}">Give Attendence</a></li>
                    <li><a href="./layout-blank.html">Manage Attandance</a></li>
                </ul>
            </li>
            @endif
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Materials</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('addmaterial')}}">Upload Materials</a></li>
                    <li><a href="./layout-blank.html">Manage Materials</a></li>
                </ul>
            </li>

        </ul>
    </div>
</div>