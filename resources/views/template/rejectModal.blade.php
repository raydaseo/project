<!-- Button trigger modal -->

<!-- Modalreject data attendance -->
<div class="modal fade" id="rejc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reject Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('attendance.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    Are you sure for rejecting this?
             @foreach ($data as $item)
                    <input type="hidden" name="id" id="att_id">
                    <input type="hidden" name="status" id="stat" value="Accepted">
            @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning">Reject</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modalreject data leave admin -->
<div class="modal fade" id="rejec" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reject Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form for="form" action="{{ route('leaveAdm.reject', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
            
                    <input type="hidden" name="id" id="leave_id">
                    <input type="hidden" name="status" id="stat" value="">
           
                    <div class="form-group">
                        <label>Reason</label>
                        <input  type="text" id="res" name="reason" class="form-control" value=""
                                   title="Reason must contain only letters"  pattern="[A-Za-z\s]+" required>
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning">Reject</button>

                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modalreject data leave owner -->
<div class="modal fade" id="reject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reject Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('leaveOwn.reject', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
            
                    <input type="hidden" name="id" id="leave_id">
                    <input type="hidden" name="status" id="stat" value="">
           
                    <div class="form-group">
                        <label>Reason</label>
                        <input  type="text" id="rsn" name="reason" class="form-control" value=""
                                   title="Reason must contain only letters"  pattern="[A-Za-z\s]+" required>
                        </div>   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning">Reject</button>
                </div>
            </form>
        </div>
    </div>
</div>
