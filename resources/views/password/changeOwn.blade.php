<!DOCTYPE html>
<html lang="en">

<head>
    @include('template.head')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('viewOwner.sidebarOwn')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('viewOwner.navbarOwn')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <table>
                        <main>
                            @include('komponen.pesan')

                            <!-- Page Heading -->
                            <div class="card shadow mb-4">
                                <div class="card-header">

                                    <!-- Content Row -->
                                    @foreach ($data as $item)
                                    @endforeach
                                    <div class="col-14 py-3">
                                        <form method="POST" action="">
                                            @csrf
                                            <input type="hidden" name="id" id="usrp_id" value="{{Auth::guard('admin')->user()->id }}">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" name="password" id="password" class="form-control" placeholder="******" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editpasso" data-usr_id="{{ Auth::guard('admin')->user()->id }}" 
                                                    data-password="{{ Auth::guard('admin')->user()->password }}">
                                                    Edit
                                                </button>
                                            </div>
                                        </form>
                                        
                                    </div>


                                </div>
                            </div>
                        </main>
                    </table>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            @include('template.footer')
            <!-- Footer -->
            <!-- End of Footer -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @include('template.logoutModal')
    @include('template.editModal')
    @include('template.script')
</body>

</html>
