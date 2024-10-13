@extends('viewAdmin.template')
@section('konten')
    <!-- Begin Page Content -->

    <thead>
        <tr>
            <th scope="col">No ID</th>
            <th scope="col">Name</th>
            <th scope="col">Position</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Telephone</th>
            <th scope="col">username</th>
            @if ( Auth::guard('admin')->user()->role == 'admin')
                <th scope="col">Action</th>
            @endif
        </tr>
    </thead>
    <tbody>
        {{-- fetch data/pengambilan data --}}
        <?php $i = 1; ?>
        @foreach ($data as $item)
            <tr>
                <td scope ="row">{{ $i++ }}</td>
                <td scope ="row">{{ $item->name }}</td>
                <td scope ="row">{{ $item->position }}</td>
                <td>{{ date('d F Y', strtotime($item->dob)) }}</td>
                <td scope ="row">{{ $item->telephone }}</td>
                <td scope ="row">{{ $item->username }}</td>
                @if (Auth::guard('admin')->user()->role == 'admin')
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit"
                            data-emps_id="{{ $item->id }}" data-nama="{{ $item->name }}"
                            data-pos="{{ $item->position }}" data-dob="{{ $item->dob }}"
                            data-telp="{{ $item->telephone }}" data-username="{{ $item->username }}"
                            >
                            Edit
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete"
                            data-hps_id="{{ $item->id }}">
                            Delete
                        </button>
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>

    @include('template.editModal')
    @include('template.addModal')
    @include('template.deleteModal')
    <!-- Modal Logout-->
    @include('template.logoutModal')
@endsection
