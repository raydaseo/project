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
                    <div class="card shadow mb-4">
                        <div class="card-header">

                            <!-- Content Row -->
                            <div class="col-14 py-3">
                                @foreach ($data as $item)
                                @endforeach
                                <form method="POST" action="{{ route('profile.update', 'index') }}">
                                    @csrf
                                    @method('PATCH') <!-- Use 'PUT' method for updating data -->
                                    <div class="modal-body">
                                        <input type="hidden" name="id" id="id" value="{{ $item->id }}">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" name="name" id="name" class="form-control" value="{{ $item->name }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Position</label>
                                                    <input type="text" name="position" id="pos" class="form-control" value="{{ $item->position }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Date of Birth</label>
                                                    <input type="date" name="dob" id="dob" class="form-control" value="{{ $item->dob }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Telephone</label>
                                                    <input type="text" name="telephone" id="telp" class="form-control" value="{{ $item->telephone }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>username</label>
                                                    <input type="username" name="username" id="username" class="form-control" value="{{ $item->username }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-secondary">
                                            Cancel
                                    </button>
                                        <button type="submit" class="btn btn-warning">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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

    @include('template.script')
</body>

</html>
