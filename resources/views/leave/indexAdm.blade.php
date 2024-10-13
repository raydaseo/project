@extends('viewAdmin.template')
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
            </tr>
        </thead>
        <tbody> 
            {{-- fetch data/pengambilan data dari tampilan Admin--}}
            <?php $i = 1; ?>
            @foreach ($data as $item)
                @if ($item->status_admin != 'Requested')
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->employee->name }}</td>
                        <td>{{ date('d F Y', strtotime($item->start_date)) }}</td>
                        <td>{{ date('d F Y', strtotime($item->end_date)) }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->responsible_person }}</td>
                        
                            @if ($item->status_admin == 'Accepted' && $item->status_owner == 'Accepted')
                            <td scope="row" style="color: rgb(76, 151, 76);"><b>Accepted</b></td>
                            @elseif ($item->status_admin == 'Accepted' && $item->status_owner == 'Rejected')
                            <td scope="row" style="color: rgb(201, 105, 105);"><b>Rejected</b></td>
                            @elseif ($item->status_admin == 'Rejected' && $item->status_owner == 'Requested')
                            <td scope="row" style="color: rgb(201, 105, 105);"><b>Rejected</b></td>
                            @elseif ($item->status_admin == 'Accepted' && $item->status_owner == 'Requested')
                            <td scope="row" style="color: rgb(81, 81, 187);"><b>Requested to Owner</b></td>
                            @endif
                    </tr>
                @endif
            @endforeach
        </tbody>

    @include('template.logoutModal')
@endsection
