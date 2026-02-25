<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li>
                <a  href="javascript:void()" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Package</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('addfees')}}">Add Package</a></li>
                    <li><a href="{{route('managefees')}}">Manage Package</a></li>
                </ul>
            </li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Student payment</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('studentsearchpage')}}">Payment</a></li>
                    <li><a href="{{route('managepayment')}}">Manage Payment</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>