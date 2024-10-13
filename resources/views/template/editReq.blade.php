
<!-- Modal Edit Request Leave-->
<div class="modal fade" id="editLeave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Request Leave</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('leaveReq.update', 'create') }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <input type="hidden" name="id" id="lev_id" value="">
                    <div class="form-group">
                        <label>Start On</label>
                        <input type="date" name="start_date" id="s_date" class="form-control" min="{{ \Carbon\Carbon::now()->toDateString() }}">
                    </div>
                    <div class="form-group">
                        <label>End On</label>
                        <input type="date" name="end_date" id="e_date" class="form-control" min="{{ \Carbon\Carbon::now()->toDateString() }}">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" id="desc" class="form-control" pattern="[A-Za-z\s]+" title="Description must contain only letters">
                    </div>
                    <div class="form-group">
                        <label>Responsible Person</label>
                        <select name="responsible_person" id="responsible_person" class="form-control select2"
                            aria-label="Default select example">
                            @foreach ($data as $item)
                                @if ($item->name != Auth::guard('emp')->user()->name) 
                                    <option value="{{$item->name}}">
                                        {{$item->name}}
                                    </option>
                                @endif
                            @endforeach
                        </select>
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

{{-- modal edit profile employee--}}
<div class="modal fade" id="editp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('profile.update', 'index') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <input type="hidden" name="id" id="empl_id" value="">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" id="namaa" class="form-control"
                                value="" pattern="[A-Za-z\s]+" title="Name must contain only letters">
                        </div>
                        <div class="form-group">
                            <label>Position</label>
                            <input type="text" name="position" id="posi" class="form-control"
                            value="" pattern="[A-Za-z\s]+" title="Position must contain only letters">
                        </div>
                        <div class="form-group">
                            <label  >Date of Birth</label>
                            <input type="date" name="dob" id="dobb" class="form-control" value="">
                          </div>
                          <div class="form-group">
                            <label >Telephone</label>
                            <input type="text" name="telephone" id="telph" class="form-control" value=""  pattern="[0-9]+" title="Telephone must contain only numbers">
                          </div>
                          <div class="form-group">
                            <label>username</label>
                            <input type="username" name="username" id="uname" class="form-control" value="" minlength="6">
                          </div>
                          <div class="form-group">
                            <label>Photo</label>
                            <input type="file" class="form-control" id="photo" name="photo" value="">
                            @error('photo')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
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

{{-- modal edit password employee --}}
<div class="modal fade" id="editEmpass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('passEmp.update', ['passEmp' => Auth::guard('emp')->user()->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <input type="hidden" name="id" id="empp_id" value="{{ Auth::guard('emp')->user()->id }}">
                    <div class="form-group">
                        <label>Current Password</label>
                        <input type="password" name="password" id="" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" name="newpassword" id="newpassword" class="form-control" required>
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





