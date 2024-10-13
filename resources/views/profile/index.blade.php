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
                                                <input type="hidden" name="id" id="empe_id"
                                                    value="{{ Auth::guard('emp')->user()->id }}">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Name</label>
                                                            <input type="text" name="name" id="name"
                                                                class="form-control"
                                                                value="{{ Auth::guard('emp')->user()->name }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Position</label>
                                                            <input type="text" name="position" id="pos"
                                                                class="form-control"
                                                                value="{{ Auth::guard('emp')->user()->position }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Date of Birth</label>
                                                            <input type="date" name="dob" id="dob"
                                                                class="form-control"
                                                                value="{{ Auth::guard('emp')->user()->dob }}"readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Telephone</label>
                                                            <input type="text" name="telephone" id="telp"
                                                                class="form-control"
                                                                value="{{ Auth::guard('emp')->user()->telephone }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>username</label>
                                                            <input type="username" name="username" id="username"
                                                                class="form-control"
                                                                value="{{ Auth::guard('emp')->user()->username }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Photo</label>
                                                            <br>
                                                            @php
                                                                $photoPath = Auth::guard('emp')->user()->photo;
                                                            @endphp

                                                            @if ($photoPath)
                                                                <img src="{{ asset('img/photoEmployee/' . $photoPath) }}"
                                                                alt="Photo" class="img-profile rounded-circle" 
                                                                style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%;">
                                                            @else
                                                                <!-- Jika foto profil tidak tersedia, gunakan foto profil default -->
                                                                <img src="{{ asset('storage/img/ava.jpg') }}"
                                                                alt="Photo" class="img-profile rounded-circle" 
                                                                style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%;">
                                                            @endif

                                                        </div>

                                                    </div>
                                                </div>

                                                <div>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#editp"
                                                        data-empl_id="{{ Auth::guard('emp')->user()->id }}"
                                                        data-namaa="{{ Auth::guard('emp')->user()->name }}"
                                                        data-posi="{{ Auth::guard('emp')->user()->position }}"
                                                        data-dobb="{{ Auth::guard('emp')->user()->dob }}"
                                                        data-telph="{{ Auth::guard('emp')->user()->telephone }}"
                                                        data-uname="{{ Auth::guard('emp')->user()->username }}"
                                                        data-photo="{{ Auth::guard('emp')->user()->photo }}">
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
    @include('template.editReq')
    @include('template.script')
</body>

</html>
