@extends('layout.template')
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
            <th scope="col">Acc Admin</th>
            <th scope="col">Acc Owner</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody> 
        {{-- fetch data/pengambilan data dari tampilan Admin--}}
        <?php $i = 1; ?>
        @foreach ($data as $item)
        @if (Auth::check() && Auth::user()->role == 'admin')
        @if ($item->status_admin != 'Requested')
            <tr>
                <td scope ="row">{{ $i++ }}</td>
                <td scope ="row">{{ $item->employee->name }}</td>
                <td scope ="row">{{ $item->start_date }}</td>
                <td scope ="row">{{ $item->end_date }}</td>
                <td scope ="row">{{ $item->description }}</td>
                <td scope ="row">{{ $item->responsible_person }}</td>
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
                @if ($item->status_admin && $item->status_owner == 'Accepted')
                <td scope ="row">{{ $item->status_owner }}</td>
                @elseif ($item->status_admin =='Accepted' && $item->status_owner == 'Rejected')
                <td scope ="row">{{ $item->status_owner }}</td>
                @elseif ($item->status_admin =='Rejected' && $item->status_owner == 'Requested')
                <td scope ="row">{{ $item->status_admin }}</td>
                @elseif ($item->status_admin =='Accepted' && $item->status_owner == 'Requested')
                <td scope ="row">{{ $item->status_owner }}</td>
                @endif
            </tr>
            @endif
            @endif

            {{-- fetch data/pengambilan data dari tampilan owner--}}
        
            @if (Auth::check() && Auth::user()->role == 'owner')
            
            @if ($item->status_owner != 'Requested')
            <tr>
                <td scope ="row">{{ $i++ }}</td>
                <td scope ="row">{{ $item->employee->name }}</td>
                <td scope ="row">{{ $item->start_date }}</td>
                <td scope ="row">{{ $item->end_date }}</td>
                <td scope ="row">{{ $item->description }}</td>
                <td scope ="row">{{ $item->responsible_person }}</td>
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
                @if ($item->status_admin && $item->status_owner == 'Accepted')
                <td scope ="row">{{ $item->status_owner }}</td>
                @elseif ($item->status_admin =='Accepted' && $item->status_owner == 'Rejected')
                <td scope ="row">{{ $item->status_owner }}</td>
                @endif
            </tr>
        @endif
        @endif

        {{-- fetch data/pengambilan data dari tampilan employee--}}
        
        @if (Auth::guard('emp')->check())
            
        @if ($item->status_owner != 'Requested')
        <tr>
            <td scope ="row">{{ $i++ }}</td>
            <td scope ="row">{{ $item->employee->name }}</td>
            <td scope ="row">{{ $item->start_date }}</td>
            <td scope ="row">{{ $item->end_date }}</td>
            <td scope ="row">{{ $item->description }}</td>
            <td scope ="row">{{ $item->responsible_person }}</td>
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
            @if ($item->status_admin && $item->status_owner == 'Accepted')
            <td scope ="row">{{ $item->status_owner }}</td>
            @elseif ($item->status_admin =='Accepted' && $item->status_owner == 'Rejected')
            <td scope ="row">{{ $item->status_owner }}</td>
            @endif
        </tr>
    @endif
    @endif
        @endforeach
    </tbody>
    </table>
    @include('template.logoutModal')
@endsection