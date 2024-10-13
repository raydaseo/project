<!-- Modal add employee-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Data Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @foreach ($data as $item)
            <form action="{{ url('employee/') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name"  pattern="[A-Za-z\s]+" title="Name must contain only letters">
                    </div>
                    <div class="form-group">
                        <label>Position</label>
                        <input type="text" name="position" class="form-control" placeholder="Enter position" pattern="[A-Za-z\s]+" title="Position must contain only letters">
                    </div>
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" name="dob" class="form-control" placeholder="Enter date of birth">
                    </div>
                    <div class="form-group">
                        <label>Telephone</label>
                        <input type="text" name="telephone" class="form-control" placeholder="Enter Phone Number" pattern="[0-9]+" title="Telephone must contain only numbers">
                    </div>
                    <div class="form-group">
                        <label>username</label>
                        <input type="username" name="username" class="form-control" placeholder="Enter Username"  minlength="6" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password"  minlength="6" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
            @endforeach
        </div>
    </div>
</div>

<!-- Modal add salary-->
<div class="modal fade" id="addSal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Data Salary</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('salary/') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Choose Name</label>
                        <select name="id_employees" id="id_employees" class="form-control select2"
                            aria-label="Default select example">
                            <option selected> -- Name -- </option>
                            @foreach ($data as $row)
                                    <!-- Check if employee is not null -->
                                <option value="{{$row->id}}">
                                    {{$row->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Salary</label>
                        <input type="text" name="salary" class="form-control" placeholder="Enter Salary" pattern="[0-9]+" title="Salary must contain only numbers">
                    </div>
                    <div class="form-group">
                        <label>Bonus</label>
                        <input type="text" name="bonus" class="form-control" placeholder="Enter Bonus" pattern="[0-9]+" title="Bonus must contain only numbers">
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" name="date" class="form-control" min="{{ \Carbon\Carbon::now()->toDateString() }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>


