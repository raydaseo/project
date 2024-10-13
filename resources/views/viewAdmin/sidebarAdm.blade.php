 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-fastbridge sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-book-reader"></i>
        </div>
        <div class="sidebar-brand-text mx-3">FASTBRIDGE </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Heading -->
    <li>
        <div class="sidebar-heading">
            GENERAL
        </div>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{request()->is('dashboard') ? 'active' : ''}}">
        <a class="nav-link" href="/dashboard">
           <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item {{request()->is('passUser') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="/passUser">
            <i class="fas fa-key"></i>
            <span>Change Password</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        ATTENDANCES
    </div>
    <!-- Nav Item - General -->

        <li class="nav-item {{ request()->is('attendanceAdm/create') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('attendanceAdm/create') }}">
                <i class="fas fa-vote-yea"></i>
                <span style="margin-right: 10px;">Requests</span>
                @php
                    $countAtt = \App\Models\Attendance::countActiveA();
                @endphp
                @if ($countAtt > 0)
                    <span class="badge badge-primary badge-counter-center">{{ $countAtt }}</span>
                @endif
            </a>
        </li>

    <li class="nav-item {{request()->is('attendanceAdm') ? 'active' : ''}}">
        <a class="nav-link" href="{{ url('attendanceAdm') }}">
            <i class="fas fa-pen"></i>
            <span>Records</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <li>
        <div class="sidebar-heading">
            LEAVES
        </div>
    </li>

    <!-- Nav Item - General -->
    
    <li class="nav-item {{ request()->is('leaveAdm/create') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('leaveAdm/create') }}">
            <i class="fas fa-vote-yea"></i>
            <span style="margin-right: 10px;">Requests</span>
            @php
                $countLeave = \App\Models\Leave::countActiveL();
            @endphp
            @if ($countLeave > 0)
                <span class="badge badge-primary badge-counter-center">{{ $countLeave }}</span>
            @endif
        </a>        
    </li>
    
</a>
</li>
    <li class="nav-item {{request()->is('leaveAdm') ? 'active' : ''}}">
        <a class="nav-link" href="{{ url('leaveAdm') }}">
            <i class="fas fa-pen"></i>
            <span>Records</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <li>
        <div class="sidebar-heading">
            EMPLOYEES
        </div>
    </li>

    <!-- Nav Item - General -->

        <li class="nav-item {{request()->is('employee/create') ? 'active' : ''}}">
            <a class="nav-link" href="{{ url('employee/create') }}">
                <i class="fas fa-user-edit"></i>
                <span>Management Employee</span></a>
        </li>
    <li class="nav-item {{request()->is('employee') ? 'active' : ''}}">
        <a class="nav-link" href="{{ url('employee') }}">
            <i class="fas fa-user-friends"></i>
            <span>List of Employees</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->