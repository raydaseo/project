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
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody> 
        {{-- fetch data/pengambilan data dari tampilan Admin--}}
        <?php $i = 1; ?>
        @foreach ($dtLev as $item)
        @if ($item->status_admin == 'Requested' && $item->id_employees == Auth::guard("emp")->user()->id)
            <tr>
                <td scope ="row">{{ $i++ }}</td>
                <td scope ="row">{{ $item->employee->name }}</td>
                <td scope="row">{{ date('d F Y', strtotime($item->start_date)) }}</td>
                <td scope="row">{{ date('d F Y', strtotime($item->end_date)) }}</td>
                <td scope ="row">{{ $item->description }}</td>
                <td scope ="row">{{ $item->responsible_person }}</td>

                @if ($item->status_admin =='Accepted' && $item->status_owner == 'Requested')
                <td scope ="row">{{ $item->status_owner }}</td>
                @elseif ($item->status_admin =='Requested' && $item->status_owner == 'Requested')
                <td scope ="row">{{ $item->status_owner }}</td>
                @endif

                <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editLeave"
                    data-lev_id="{{ $item->id }}" data-s_date="{{ $item->start_date }}" data-e_date="{{ $item->end_date }}" 
                    data-desc="{{ $item->description }}" data-rp="{{ $item->responsible_person }}"  >
                        Edit
                    </button>
                    <button type="button"  class="btn btn-danger" data-toggle="modal" data-target="#deleteleave" 
                        data-leav_id="{{ $item->id }}">
                            Delete
                        </button>
              </td>
            </tr>
           
            @endif

        @endforeach
    </tbody>
    {{-- </table> --}}
    @include('template.deleteModal')
    @include('template.editReq')
    @include('template.addReq')
    @include('template.logoutModal')
@endsection