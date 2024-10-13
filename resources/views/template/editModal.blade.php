<!-- Modal Edit Employee-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('employee.update', 'create') }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <input type="hidden" name="id" id="emps_id" value="">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                            placeholder="Enter Name" pattern="[A-Za-z\s]+" title="Name must contain only letters">
                    </div>
                    <div class="form-group">
                        <label>Position</label>
                        <input type="text" name="position" id="pos" class="form-control"
                            placeholder="Enter position" pattern="[A-Za-z\s]+" title="Position must contain only letters">
                    </div>
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" name="dob" id="dob" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Telephone</label>
                        <input type="text" name="telephone" id="telp" class="form-control" pattern="[0-9]+" title="Telephone must contain only numbers">
                    </div>
                    <div class="form-group">
                        <label>username</label>
                        <input type="username" name="username" id="username" class="form-control" minlength="6" >
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Edit Salary-->
<div class="modal fade" id="editSal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Salary</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('salary.update', $item->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <input type="hidden" name="id" id="sal_id" value="">
                    <div class="form-group">
                        <label>Salary</label>
                        <input type="text" name="salary" id="sal" class="form-control"
                            placeholder="Enter Salary" pattern="[0-9]+" title="Salary must contain only numbers">
                    </div>
                    <div class="form-group">
                        <label>Bonus</label></label>
                        <input type="text" name="bonus" id="bon" class="form-control" pattern="[0-9]+" title="Bonus must contain only numbers">
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" name="date" id="date" class="form-control" min="{{ \Carbon\Carbon::now()->toDateString() }}">
                    </div>
                    <input type="hidden" name="total" id="total" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- modal edit profile user --}}
<div class="modal fade" id="editu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('profileUser.update', 'index') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <input type="hidden" name="id" id="usr_id" value="">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ Auth::guard('admin')->user()->name }}"  pattern="[A-Za-z\s]+" title="Name must contain only letters">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="{{ Auth::guard('admin')->user()->username }}"  minlength="6" >
                    </div>
                    <div class="form-group">
                        <label>Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning">Save changes</button>
                </div>
            </form>
        </div>

    </div>
</div>
</div>

{{-- modal edit password user --}}
<div class="modal fade" id="editpass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('passUser.update', ['passUser' => Auth::guard('admin')->user()->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <input type="hidden" name="id" id="usrp_id" value="{{ Auth::guard('admin')->user()->id }}">
                    <div class="form-group">
                        <label>Current Password</label>
                        <input type="password" name="password" id="" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" name="newpassword" id="newpassword" class="form-control" minlength="6" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning">Save changes</button>
                </div>
            </form>
            
        </div>

    </div>
</div>
</div>
