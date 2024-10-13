<!-- Button trigger modal -->

<!-- Modal attendance-->
<div class="modal fade" id="acc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Accept Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('attendanceAdm.update', $item->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    Are you sure for accepting this?
             @foreach ($data as $item)
                    <input type="hidden" name="id" id="att_id">
             @endforeach
                    <input type="hidden" name="status" id="stat" value="Accepted">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Accept</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal acc leave admin-->
<div class="modal fade" id="accept" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Accept Leave Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('leave.update', $item->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-body">
             @foreach ($data as $item)
                    <input type="hidden" name="id" id="leave_id">
                    <input type="hidden" name="status_admin" id="stat" value="Accepted">
            @endforeach
                    Are you sure for accepting this?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Accept</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal acc leave owner-->
<div class="modal fade" id="accep" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Accept Leave Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('leave.update', $item->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    Are you sure for accepting this?
             @foreach ($data as $item)
                    <input type="hidden" name="id" id="leave_id">
                    <input type="hidden" name="status_owner" id="stat" value="Accepted">
            @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Accept</button>
                </div>
            </form>
        </div>
    </div>
</div>
