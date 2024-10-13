<!DOCTYPE html>
<html lang="en">

<head>
    @include('template.head')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->

        @include('viewEmp.sidebarEmp')

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('viewEmp.navbarEmp')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    @if (Route::is('employee*'))
                        <h1 class="h3 mb-2 text-gray-800">Employee</h1>
                    @elseif(Route::is('attendance*'))
                        <h1 class="h3 mb-2 text-gray-800">Attendance</h1>
                    @elseif(Route::is('leave*'))
                        <h1 class="h3 mb-2 text-gray-800">Leave</h1>
                    @endif

                    {{-- khusus Add data karena div headernya di page ini --}}
                    <!-- DataTables Example -->
                    <div class="card shadow mb-4">
                        @if (Route::currentRouteName() == 'attendance.create')
                            <div class="card-header">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#addReqAtt">
                                    Request
                                </button>
                            </div>
                        @endif
                        @if (Route::currentRouteName() == 'leaveReq.create')
                            <div class="card-header">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#addReqLeave">
                                    Request
                                </button>
                            </div>
                        @endif
                        @if (Route::currentRouteName() == 'salary.index')
                            <div class="card-header">
                                <a href="{{ 'slip' }}" target="_blank"
                                    class="btn btn-sm btn-primary shadow-sm">
                                    <i class="fas fa-download fa-sm text-white-50"></i> Salary Slip
                                </a>
                            </div>
                        @endif
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <main>
                                    @include('komponen.pesan')
                                    @yield('konten')
                                </main>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        @include('template.footer')
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('template.script')
</body>

</html>
