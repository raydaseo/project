 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-laugh-wink"></i>
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
     <li class="nav-item">
         <a class="nav-link" href="/dashboard">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>
     <li class="nav-item">
         <a class="nav-link collapsed">
             <i class="fas fa-fw fa-cog"></i>
             <span>Change Password</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         ATTENDANCES
     </div>
     <!-- Nav Item - General -->
     @if (Auth::user()->role == 'admin')
         <li class="nav-item">
             <a class="nav-link" href="{{ url('attendance/create') }}">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Attendance's Request</span></a>
         </li>
     @endif
     <li class="nav-item">
         <a class="nav-link" href="{{ url('attendance') }}">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Attendance's Records</span></a>
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
     <li class="nav-item ">
         <a class="nav-link" href="{{ url('leave/create') }}">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Leave's Request</span></a>
     </li>
     <li class="nav-item ">
         <a class="nav-link" href="{{ url('leave') }}">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Leave's Records</span></a>
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
     @if (Auth::user()->role == 'admin')
         <li class="nav-item">
             <a class="nav-link" href="{{ url('employee/create') }}">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Management Employee</span></a>
         </li>
     @endif
     <li class="nav-item">
         <a class="nav-link" href="{{ url('employee') }}">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>List of Employees</span></a>
     </li>

     @if (Auth::user()->role == 'owner')
         <!-- Divider -->
         <hr class="sidebar-divider">

         <!-- Heading -->
         <li>
             <div class="sidebar-heading">
                 SALARY
             </div>
         </li>
         <!-- Nav Item - Salary -->
         <li class="nav-item">
             <a class="nav-link" href="{{ url('salary/create') }}">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Add Salary</span></a>
         </li>

         <!-- Divider -->
         <hr class="sidebar-divider">

         <!-- Heading -->
         <li>
             <div class="sidebar-heading">
                 Master
             </div>
         </li>
         <!-- Nav Item - Salary -->
         <li class="nav-item">
             <a class="nav-link" href="{{ url('report/index') }}">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Recapitulation Report</span></a>
         </li>
     @endif


     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
 <!-- End of Sidebar -->