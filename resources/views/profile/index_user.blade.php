<!DOCTYPE html>
<html lang="en">

<head>
    @include('template.head')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('viewAdmin.sidebarAdm')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('viewAdmin.navbarAdm')
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
                                            <div class="modal-body">
                                                <input type="hidden" name="id" id="usr_id"
                                                    value="{{ Auth::guard('admin')->user()->id }}">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Name</label>
                                                            <input type="text" name="name" id="name"
                                                                class="form-control"
                                                                value="{{ Auth::guard('admin')->user()->name }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Username</label>
                                                            <input type="text" name="username" id="username"
                                                                class="form-control"
                                                                value="{{ Auth::guard('admin')->user()->username }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Photo</label>
                                                            <br>
                                                            @php
                                                                $photoPath = Auth::guard('admin')->user()->photo;
                                                            @endphp

                                                        
                                                        @if ($photoPath)
                                                        <!-- Jika foto profil tersedia -->
                                                        <img src="{{ asset('img/photoUser/' . $photoPath) }}"
                                                            alt="Photo" class="img-profile rounded-circle" 
                                                            style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%;">
                                                        @else
                                                        <!-- Jika foto profil tidak tersedia, gunakan foto profil default -->
                                                        <img src="{{ asset('storage/img/ava.jpg') }}"
                                                            alt="Default Photo" class="img-profile rounded-circle"
                                                            style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%;">
                                                        @endif
                                                    

                                                        </div>

                                                    </div>
                                                </div>
                                                <div>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#editu"
                                                        data-usr_id="{{ Auth::guard('admin')->user()->id }}"
                                                        data-nama="{{ Auth::guard('admin')->user()->name }}"
                                                        data-uname="{{ Auth::guard('admin')->user()->username }}"
                                                        data-photo="{{ Auth::guard('admin')->user()->photo }}">
                                                        Edit
                                                    </button>
                                                </div>
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
