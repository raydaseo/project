<!-- Bootstrap core JavaScript-->
<script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('template/js/demo/datatables-demo.js') }}"></script>

{{-- modal edit jquery script --}}
<script>
    $("#edit").on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget)
        var nama = button.data('nama')
        var pos = button.data('pos')
        var emps_id = button.data('emps_id')
        var dob = button.data('dob')
        var telp = button.data('telp')
        var username = button.data('username')
       

        var modal = $(this)
        modal.find('.modal-body #name').val(nama);
        modal.find('.modal-body #pos').val(pos);
        modal.find('.modal-body #emps_id').val(emps_id);
        modal.find('.modal-body #dob').val(dob);
        modal.find('.modal-body #telp').val(telp);
        modal.find('.modal-body #username').val(username);
       
    });
</script>
<script>
    $("#editSal").on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget)
        var sal_id = button.data('sal_id')
        var salary = button.data('sal')
        var bonus = button.data('bon')
        var date = button.data('date')
        var total = button.data('total')

        var modal = $(this)
        modal.find('.modal-body #sal_id').val(sal_id);
        modal.find('.modal-body #sal').val(salary);
        modal.find('.modal-body #bon').val(bonus);
        modal.find('.modal-body #date').val(date);
        modal.find('.modal-body #total').val(total);

        // event listener untuk menghitung total saat modal ditampilkan
        modal.find('.modal-body #sal, .modal-body #bon').on('input', function() {
            var newSalary = parseFloat(modal.find('.modal-body #sal').val()) || 0;
            var newBonus = parseFloat(modal.find('.modal-body #bon').val()) || 0;
            var newTotal = newSalary + newBonus;

            // Memperbarui nilai total
            modal.find('.modal-body #total').val(newTotal);
        });
    });

    $("#delSal").on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget);
        var sal_id = button.data('sal_id');

        var modal = $(this);
        modal.find('.modal-body #sal_id').val(sal_id);

        var formAction = "{{ route('salary.destroy', ['salary' => ':id']) }}";
        formAction = formAction.replace(':id', sal_id);
        modal.find('form').attr('action', formAction);
    });
</script>

<!--modal untuk hapus employee-->
<script>
$("#delete").on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget);
        var hps_id = button.data('hps_id');

        var modal = $(this);
        modal.find('.modal-body #hps_id').val(hps_id);

        // Check if the route requires an 'id' parameter
        var formAction = "{{ route('employee.destroy', ['employee' => ':id']) }}";
        formAction = formAction.replace(':id', hps_id);
        modal.find('form').attr('action', formAction);
    });

</script>
{{-- modal untuk manajemen ajuan attendance --}}
<script>
    $("#acc").on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget);
        var att_id = button.data('att_id')
        var stat = button.data('stat');

        var modal = $(this);
        modal.find('.modal-body #att_id').val(att_id);
        modal.find('.modal-body #stat').val(stat);

        var formAction = "{{ route('attendanceAdm.update', ':id') }}";
        formAction = formAction.replace(':id', att_id);
        modal.find('form').attr('action', formAction);
    });
    $("#rejc").on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget);
        var att_id = button.data('att_id')
        var stat = button.data('stat');

        var modal = $(this);
        modal.find('.modal-body #att_id').val(att_id);
        modal.find('.modal-body #stat').val(stat);

        var formAction = "{{ route('attendanceAdm.reject', ['id' => ':id']) }}";
        formAction = formAction.replace(':id', att_id);
        modal.find('form').attr('action', formAction);
    });

    
</script>

{{-- modal untuk manajemen ajuan leave admin --}}
<script>
    $("#accept").on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget);
        var leave_id = button.data('leave_id')
        var stat = button.data('stat');

        var modal = $(this);
        modal.find('.modal-body #leave_id').val(leave_id);
        modal.find('.modal-body #stat').val(stat);

        var formAction = "{{ route('leave.update', ':id') }}";
        formAction = formAction.replace(':id', leave_id);
        modal.find('form').attr('action', formAction);
    });
    $("#rejec").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget);
    var leave_id = button.data('leave_id')
    var stat = button.data('stat');
    var res = button.data('res');
    

    var modal = $(this);
    modal.find('.modal-body #leave_id').val(leave_id);
    modal.find('.modal-body #stat').val(stat);
    modal.find('.modal-body #res').val(res);
   

    var formAction = "{{ route('leaveAdm.reject', ['id' => ':id']) }}";
    formAction = formAction.replace(':id', leave_id);
    modal.find('form').attr('action', formAction);
});


    $("#delet").on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget);
        var leave_id = button.data('leave_id');

        var modal = $(this);
        modal.find('.modal-body #leave_id').val(leave_id);

        // Check if the route requires an 'id' parameter
        var formAction = "{{ route('leave.destroy', ['leave' => ':id']) }}";
        formAction = formAction.replace(':id', leave_id);
        modal.find('form').attr('action', formAction);
    });
</script>

{{-- modal untuk manajemen ajuan leave owner --}}
<script>
    $("#accep").on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget);
        var leave_id = button.data('leave_id')
        var stat = button.data('stat');

        var modal = $(this);
        modal.find('.modal-body #leave_id').val(leave_id);
        modal.find('.modal-body #stat').val(stat);

        var formAction = "{{ route('leave.update', ':id') }}";
        formAction = formAction.replace(':id', leave_id);
        modal.find('form').attr('action', formAction);
    });
    $("#reject").on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget);
        var leave_id = button.data('leave_id')
        var stat = button.data('stat');
        var rsn = button.data('rsn');

        var modal = $(this);
        modal.find('.modal-body #leave_id').val(leave_id);
        modal.find('.modal-body #stat').val(stat);
        modal.find('.modal-body #rsn').val(rsn);

        var formAction = "{{ route('leaveOwn.reject', ['id' => ':id']) }}";
        formAction = formAction.replace(':id', leave_id);
        modal.find('form').attr('action', formAction);
    });

    $("#delets").on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget);
        var leave_id = button.data('leave_id');

        var modal = $(this);
        modal.find('.modal-body #leave_id').val(leave_id);

        // Check if the route requires an 'id' parameter
        var formAction = "{{ route('leave.destroy', ['leave' => ':id']) }}";
        formAction = formAction.replace(':id', leave_id);
        modal.find('form').attr('action', formAction);
    });

</script>

<script>
    $("#hapuz").on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget);
        var id_id = button.data('id_id');

        var modal = $(this);
        modal.find('.modal-body #id_id').val(id_id);

        var formAction = "{{ route('attendance.destroy', ['attendance' => ':id']) }}";
        formAction = formAction.replace(':id', id_id);
        modal.find('form').attr('action', formAction);
    });
</script>

{{-- untuk attendance request employee --}}
<script>
    $("#deleteReqAtt").on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget);
        var attd_id = button.data('attd_id');

        var modal = $(this);
        modal.find('.modal-body #attd_id').val(attd_id);

        var formAction = "{{ route('attendance.destroy', ['attendance' => ':id']) }}";
        formAction = formAction.replace(':id', attd_id);
        modal.find('form').attr('action', formAction);
        
    });
</script>

<script>
    $("#benarEditRA").on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget)
        var id_req = button.data('id_req')
        var datte = button.data('datte')

        var modal = $(this)
        modal.find('.modal-body #id_req').val(id_req);
        modal.find('.modal-body #datte').val(datte);
    });
</script>
 {{-- edit req leave --}}
<script>
    $("#editLeave").on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget);
        var lev_id = button.data('lev_id');
        var s_date = button.data('s_date');
        var e_date = button.data('e_date');
        var desc = button.data('desc');
        var rp = button.data('rp');

        var modal = $(this);
        modal.find('.modal-body #lev_id').val(lev_id);
        modal.find('.modal-body #s_date').val(s_date);
        modal.find('.modal-body #e_date').val(e_date);
        modal.find('.modal-body #desc').val(desc);
        modal.find('.modal-body #rp').val(rp);
    });
</script>
<script>
    $("#deleteleave").on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget);
        var leav_id = button.data('leav_id');

        var modal = $(this);
        modal.find('.modal-body #leav_id').val(leav_id);

        var formAction = "{{ route('leave.destroy', ['leave' => ':id']) }}";
        formAction = formAction.replace(':id', leav_id);
        modal.find('form').attr('action', formAction);
    });
</script>

<script>
    $("#editp").on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget)
        var empl_id = button.data('empl_id')
        var namaa = button.data('namaa')
        var posi = button.data('posi')
        var dobb = button.data('dobb')
        var telph = button.data('telph')
        var uname = button.data('uname')
        


        var modal = $(this)
        modal.find('.modal-body #empl_id').val(empl_id);
        modal.find('.modal-body #namaa').val(namaa);
        modal.find('.modal-body #posi').val(posi);
        modal.find('.modal-body #dobb').val(dobb);
        modal.find('.modal-body #telph').val(telph);
        modal.find('.modal-body #uname').val(uname);
        

    });
</script>

{{-- edit profile user --}}
<script>
    $("#editu").on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget)
        var nama = button.data('nama')
        var uname = button.data('uname')
        var usr_id = button.data('usr_id')

        var modal = $(this)
        modal.find('.modal-body #name').val(nama);
        modal.find('.modal-body #username').val(uname); // Menetapkan nilai username
        modal.find('.modal-body #usr_id').val(usr_id);
    });
</script>

{{-- edit passowrd user --}}
<script>
    $("#editpass").on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget)
        var password = button.data('password')
        var usrp_id = button.data('usrp_id')

        var modal = $(this)
        modal.find('.modal-body #password').val(password);
        modal.find('.modal-body #usrp_id').val(usrp_id);
    });
</script>

<script>
    $("#editEmpass").on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget)
        var password = button.data('password')
        var empp_id = button.data('empp_id')

        var modal = $(this)
        modal.find('.modal-body #password').val(password);
        modal.find('.modal-body #empp_id').val(empp_id);
    });
</script>


