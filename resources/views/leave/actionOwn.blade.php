@extends('viewOwner.template')
@section('konten')
    {{-- OWNER --}}
    <!-- Begin Page Content admin-->
    <thead>
        <tr>
            <th scope="col">No ID</th>
            <th scope="col">Name</th>
            <th scope="col">Start on</th>
            <th scope="col">End on</th>
            <th scope="col">Description</th>
            <th scope="col">Responsible Person</th>
            <th scope="col">Status</th>
            <th scope="col">Acc Admin</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        {{-- fetch data/pengambilan data --}}
        <?php $i = 1; ?>
        @foreach ($data as $item)
        @if ($item->status_admin == 'Accepted' && $item->status_owner == 'Requested')
                <tr>
                    <td scope ="row">{{ $i++ }}</td>
                    <td scope ="row">{{ $item->employee->name }}</td>
                    <td scope="row">{{ date('d F Y', strtotime($item->start_date)) }}</td>
                    <td scope="row">{{ date('d F Y', strtotime($item->end_date)) }}</td>
                    <td scope ="row">{{ $item->description }}</td>
                    <td scope ="row">{{ $item->responsible_person }}</td>
                    <td scope="row">{{ $item->status_owner }}</></td>
                    <td scope="row" style="color: rgb(76, 151, 76); font-weight: bold;">
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
                    
                    <td>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#accep"
                            data-leave_id="{{ $item->id }}" data-stat="{{ $item->status_owner }}">
                            Accept
                        </button>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#reject"
                            data-leave_id="{{ $item->id }}" data-stat="{{ $item->status_owner }}" data-rsn="{{ $item->reason }}">
                            Reject
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delets"
                            data-leave_id="{{ $item->id }}">
                            Delete
                        </button>
                    </td>
            @endif
            </tr>
        @endforeach
    </tbody>
    </table>

    @include('template.accModal')
    @include('template.rejectModal')
    @include('template.deleteModal')
    @include('template.logoutModal')
@endsection
