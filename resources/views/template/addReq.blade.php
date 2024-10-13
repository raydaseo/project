<!-- Modal add request attendance-->
<div class="modal fade" id="addReqAtt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Request Attendance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @foreach ($data as $item)
            <form action="{{ url('attendance/') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id_employees" value={{ Auth::guard('emp')->user()->id }}>
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
            @endforeach
        </div>
    </div>
</div>

<!-- Modal add request leave-->
<div class="modal fade" id="addReqLeave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Request Leave</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('leaveReq') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id_employees" value={{ Auth::guard('emp')->user()->id }}>
                    <div class="form-group">
                        <label>Start On</label>
                        <input type="date" name="start_date" class="form-control" min="{{ \Carbon\Carbon::now()->toDateString() }}">
                    </div>
                    <div class="form-group">
                        <label>End On</label>
                        <input type="date" name="end_date" class="form-control" min="{{ \Carbon\Carbon::now()->toDateString() }}">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" pattern="[A-Za-z\s]+" title="Description must contain only letters">
                    </div>
                    <div class="form-group">
                        <label>Responsible Person</label>
                        <select name="responsible_person" id="responsible_person" class="form-control select2" aria-label="Default select example">
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
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>