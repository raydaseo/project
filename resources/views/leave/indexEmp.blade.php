@extends('viewEmp.template')
@section('konten')

<!-- Begin Page Content -->
<thead>
    <tr>
        <th scope="col">No</th>
        <th scope="col">Name</th>
        <th scope="col">Start on</th>
        <th scope="col">End on</th>
        <th scope="col">Description</th>
        <th scope="col">Responsible Person</th>
        <th scope="col">Status</th>
        <th scope="col">Reason</th>
    </tr>
</thead>
<tbody> 
    {{-- fetch data/pengambilan data dari tampilan Employee--}}
    <?php $i = 1; ?>
    @foreach ($data as $item)
    @if ($item->id_employees== Auth::guard('emp')->user()->id)
    @if ($item->status_admin != 'Requested')
        <tr>
            <td scope ="row">{{ $i++ }}</td>
            <td scope ="row">{{ $item->employee->name }}</td>
            <td scope="row">{{ date('d F Y', strtotime($item->start_date)) }}</td>
            <td scope="row">{{ date('d F Y', strtotime($item->end_date)) }}</td>
            <td scope ="row">{{ $item->description }}</td>
            <td scope ="row">{{ $item->responsible_person }}</td>
            
            @if ($item->status_admin && $item->status_owner == 'Accepted')
            <td scope="row" style="color: rgb(76, 151, 76);"><b>{{ $item->status_owner }}</b></td>

            @elseif ($item->status_admin == 'Accepted' && $item->status_owner == 'Rejected')
            <td scope="row" style="color: rgb(201, 105, 105);"><b>{{ $item->status_owner }}</b></td>

            @elseif ($item->status_admin == 'Rejected' && $item->status_owner == 'Requested')
            <td scope="row" style="color: rgb(201, 105, 105);"><b>{{ $item->status_admin }}</b></td>

            @elseif ($item->status_admin == 'Accepted' && $item->status_owner == 'Requested')
            <td scope="row" style="color: rgb(81, 81, 187);"><b>Requested to Owner</b></td>
            @endif
            <td scope ="row">{{ $item->reason}}</td>
        
        </tr>
        @endif
        @endif
        @endforeach
    </tbody>
    @include('template.logoutModal')
@endsection