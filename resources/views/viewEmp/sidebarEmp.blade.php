
<!-- Page Wrapper -->
<div id="wrapper">

 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand atas pojok kanan ada logonya -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-book-reader"></i>
         </div>
         <div class="sidebar-brand-text mx-3">FASTBRIDGE 
         </div>
     </a>

     <!-- garis -->
     <hr class="sidebar-divider my-0">

     <!-- Heading -->
     <li>
         <div class="sidebar-heading">
             GENERAL
         </div>
     </li>

     <!-- Nav Item - Dashboard -->
     <li class="nav-item {{request()->is('dashboardEmp') ? 'active' : ''}}">
         <a class="nav-link" href="/dashboardEmp">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span>
        </a>
     </li>
     <li class="nav-item {{request()->is('passEmp') ? 'active' : ''}}">
         <a class="nav-link collapsed" href="/passEmp">
            <i class="fas fa-key"></i>
             <span>Change Password</span>
        </a>
     </li>

     <!-- garis -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         ATTENDANCES
     </div>
     <!-- Nav Item - General -->

         <li class="nav-item {{request()->is('attendance/create') ? 'active' : ''}}">
            <a class="nav-link" href="{{ url('attendance/create') }}">
                <i class="fas fa-vote-yea"></i>
                 <span>Requests</span>
            </a>
         </li>

     <li class="nav-item {{request()->is('attendance') ? 'active' : ''}}">
         <a class="nav-link" href="{{ url('attendance') }}">
            <i class="fas fa-pen"></i>
             <span>Records</span>
            </a>
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
     <li class="nav-item {{request()->is('leaveReq/create') ? 'active' : ''}}">
         <a class="nav-link" href="{{ url('leaveReq/create') }}">
            <i class="fas fa-vote-yea"></i>
             <span>Request</span></a>
     </li>
     <li class="nav-item {{request()->is('leave') ? 'active' : ''}}">
         <a class="nav-link" href="{{ url('leave') }}">
            <i class="fas fa-pen"></i>
             <span>Records</span></a>
     </li>

     <!-- Heading -->
    
         <!-- Divider -->
         <hr class="sidebar-divider">

         <!-- Heading -->
         <li>
             <div class="sidebar-heading">
                 Salary
             </div>
         </li>
         <!-- Nav Item - Salary -->
         <li class="nav-item {{request()->is('salary') ? 'active' : ''}}">
             <a class="nav-link" href="{{ url('salary') }}">
                <i class="fas fa-hand-holding-usd"></i>
                 <span>My Salary</span></a>
         </li>


     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>
 </ul>

 
 <!-- End of Sidebar -->
</div>


