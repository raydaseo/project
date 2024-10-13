{{-- khusus Add data karena div headernya di page ini --}}
                    <!-- DataTables Example -->
                    <div class="card shadow mb-4">
                        @if (Auth::check() && Auth::user()->role == 'admin' && Route::currentRouteName() == 'employee.create')
                            <div class="card-header">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#addModal">
                                    Add Employee
                                </button>
                            </div>
                        @elseif (Auth::check() && Auth::user()->role == 'owner' && Route::currentRouteName() == 'salary.create')
                        <div class="card-header">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#addSal">
                                Add Salary
                            </button>
                        </div>
                        @elseif (Auth::guard('emp')->check() && Route::currentRouteName() == 'attendanceReq.create')
                        <div class="card-header">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#addReqAtt">
                                Presensi
                            </button>
                        </div>
                        @elseif (Auth::guard('emp')->check() && Route::currentRouteName() == 'leaveReq.create')
                        <div class="card-header">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#addReqLeave">
                            Request
                            </button>
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