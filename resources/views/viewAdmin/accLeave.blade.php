@extends('viewAdmin.template')
@section('konten')

        <!-- Begin Page Content admin-->
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Start on</th>
                <th scope="col">End on</th>
                <th scope="col">Description</th>
                <th scope="col">Responsible Person</th>
                <th scope="col">Status</th>
                <th scope="col">Acc Admin</th>
                <th scope="col">Acc Owner</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- fetch data/pengambilan data --}}
            <?php $i = 1; ?>
            @foreach ($data as $item)
                @if ($item->status_admin == 'Requested')
                    <tr>
        
                        <td scope ="row">{{ $i++ }}</td>
                        <td scope ="row">{{ $item->employee->name }}</td>
                        <td scope ="row">{{ $item->start_date }}</td>
                        <td scope ="row">{{ $item->end_date }}</td>
                        <td scope ="row">{{ $item->description }}</td>
                        <td scope ="row">{{ $item->responsible_person }}</td>
                        <td scope ="row" id="statusCell">{{ $item->status_admin }}</td>
                        <td scope="row">
                            @switch($item->status_admin)
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
                        <td scope="row">
                            @switch($item->status_owner)
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
                        {{-- Action Button --}}
                        <td>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#accliv" data-leave_id="{{ $item->id }}" data-stat="{{ $item->status_admin }}">
                                Accept 
                            </button>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#rejec"
                                data-leave_id="{{ $item->id }}" data-stat="{{ $item->status_admin }}">
                                Reject
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delet"
                                data-leave_id="{{ $item->id }}">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>

@include('template.accModal')
@include('template.rejectModal')
@include('template.deleteModal')
@include('template.logoutModal')
@endsection 
