@extends('viewAdmin.template')
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
        <?php
        // Memeriksa apakah tanggal sekarang sudah melewati tanggal dari item
        $today = strtotime(date('Y-m-d')); // Timestamp untuk hari ini
        $date = strtotime($item->date); // Timestamp untuk tanggal item
        ?>
         @if ($item->status == 'Requested')
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
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#acc"
                        data-att_id="{{ $item->id }}" data-stat="{{ $item->status }}">
                            Accept
                        </button>                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#rejc"
                        data-att_id="{{ $item->id }}" data-stat="{{ $item->status }}">
                            Reject
                        </button>  
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapuz" 
                            data-id_id="{{ $item->id }}">
                        Delete
                    </button>
                    
                    </td>
            </tr>
            @endif
        @endforeach
    </tbody>
    </table>
    
    @include('template.accModal')
    @include('template.rejectModal')
    @include('template.deleteModal')
    @include('template.logoutModal')

@endsection
