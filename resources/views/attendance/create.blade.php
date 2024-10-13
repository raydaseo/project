@extends('viewEmp.template')
@section('konten')
    <!-- Begin Page Content -->

    <thead>
        <tr>
            <th scope="col">No </th>
            <th scope="col">Name</th>
            <th scope="col">Date</th>
            <th scope="col">Status</th>
            <th scope="col">Acc Admin</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        {{-- fetch data/pengambilan data --}}
        <?php $i = 1; ?>
        @foreach ($data as $item)
            @if ($item->status == 'Requested' && $item->id_employees == Auth::guard('emp')->user()->id)
                <tr>
                    <td scope ="row">{{ $i++ }}</td>
                    <td scope ="row">{{ $item->employee->name }}</td>
                    <td scope="row">{{ date('d F Y', strtotime($item->date)) }}</td>
                    <td scope ="row" id="statusCell">{{ $item->status }}</td>
                    <td scope="row">
                        @switch($item->status)
                            @case('Requested')
                                Not Yet
                            @break

                            @case('Accepted')
                                Yes
                            @break

                            @case('Rejected')
                                No
                            @break
                        @endswitch
                    </td>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editReq"
                            data-att_id="{{ $item->id }}" data-dates="{{ $item->date }}">
                            Edit
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#del"
                            data-attd_id="{{ $item->id }}">
                            Delete
                        </button>
                    </td>
            @endif
        @endforeach
    </tbody>
    @include('template.deleteModal')
    @include('template.editReq')
    @include('template.addReq')
    @include('template.logoutModal')
@endsection
