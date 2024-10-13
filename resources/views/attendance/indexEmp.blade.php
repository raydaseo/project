@extends('viewEmp.template')
@section('konten')
    <!-- Begin Page Content -->

    <thead>
        <tr>
            <th scope="col">No ID</th>
            <th scope="col">Name</th>
            <th scope="col">Date</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody> 
        {{-- fetch data/pengambilan data --}}
        <?php $i = 1; ?>
        @foreach ($data as $item)
        @if ($item->id_employees == Auth::guard('emp')->user()->id)
        @if ($item->status != 'Requested')
            <tr>
                <td scope ="row">{{ $i++ }}</td>
                <td scope ="row">{{ $item->employee->name }}</td>
                <td scope="row">{{ date('d F Y', strtotime($item->date)) }}</td>
                @if ($item->status == 'Accepted')
                <td scope="row" style="color: rgb(76, 151, 76);"><b>{{ $item->status}}</b></td>
                @elseif ($item->status == 'Rejected')
                <td scope="row" style="color: rgb(201, 105, 105);"><b>{{ $item->status}}</b></td>
                @endif
            </tr>
            @endif
            @endif
        @endforeach
    </tbody>
    @include('template.logoutModal')

    
@endsection