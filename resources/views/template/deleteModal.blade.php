
<!-- Modal untuk hapus employee-->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm Delete attendance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('employee/'.$item->id) }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <h6>Are you sure want to delete this data?</h6>
             @foreach ($data as $item)
                    <input type="hidden" name="id" id="hps_id" value="">
            @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- modal delete untuk menghapus leave's request dari admin--}}
<div class="modal fade" id="delet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm Delete Leave Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('leave/'.$item->id) }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <h6>Are you sure want to delete this leave's request?</h6>
            
                    <input type="hidden" name="id" id="emp_id" value="">
          
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- modal delete untuk menghapus leave's request dari owner--}}
<div class="modal fade" id="delets" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm Delete Leave Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('leave/'.$item->id) }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <h6>Are you sure want to delete this leave's request?</h6>
            
                 <input type="hidden" name="id" id="emp_id" value="">
         
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- modal delete untuk menghapus leave's request --}}
<div class="modal fade" id="deleteleave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm Delete leave</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('leave/'.$item->id) }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <h6>Are you sure want to delete this leave's request?</h6>
             @foreach ($data as $item)
                    <input type="hidden" name="id" id="leav_id" value="">
            @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="delSal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm Delete This</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('salary/'.$item->id) }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-body">
             @foreach ($data as $item)
                    {{-- <input type="hidden" name="id" id="emp_id" value=""> --}}
            @endforeach
                    <h6>Are you sure want to delete this data?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- modal delete untuk menghapus attendance's request --}}
<div class="modal fade" id="deleteReqAtt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm Delete Attendance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('attendance/'.$item->id) }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-body">
             @foreach ($data as $item)
                    <input type="hidden" name="id" id="attd_id" value="">
            @endforeach
                    <h6>Are you sure want to delete this Attendance request?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- modal delete untuk menghapus attendance's request dari admin--}}
<div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm Delete Attendance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
             @foreach ($data as $item)
            <form action="{{url('attendanceAdm/'.$item->id) }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <input type="hidden" name="id" id="id_id" value="">
                    <h6>Are you sure want to delete this Attendance request?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
            @endforeach
        </div>
    </div>
</div>

<div class="modal" tabindex="-1"  id="hapuz">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{url('attendance/'.$item->id) }}" method="POST">
            @csrf
            @method('delete')
            <div class="modal-body">
                <h6>Are you sure want to delete this Attendance request?</h6>
         @foreach ($data as $item)
                <input type="hidden" name="id" id="id_id" value="">
        @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </form>
      </div>
    </div>
  </div>




