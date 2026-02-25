<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="./index.html">Home 1</a></li>
                    <!-- <li><a href="./index-2.html">Home 2</a></li> -->
                </ul>
            </li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa-user menu-icon"></i><span class="nav-text">Students</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('addstudent')}}">Add student</a></li>
                    <li><a href="{{route('managestudent')}}">Manage student</a></li>
                </ul>
            </li>

        </ul>
    </div>
</div>