@extends('viewOwner.template')
@section('konten')
    <!-- Begin Page Content -->
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Salary</th>
            <th scope="col">Bonus</th>
            <th scope="col">Date</th>
            <th scope="col">Total</th>
            <th scope="col">Action</th>

        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($dtSal as $item)
            <tr>
                <td scope ="row">{{ $i++ }}</td>
                <td scope ="row">{{ $item->employee->name }}</td>
                <td scope ="row">Rp. {{number_format( $item->salary,2) }}</td>
                <td scope ="row">Rp. {{number_format( $item->bonus,2) }}</td>
                <td scope="row">{{ date('d F Y', strtotime($item->date)) }}</td>
                <td scope ="row">Rp. {{number_format( $item->total,2) }}</td>
                <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editSal"
                        data-sal_id="{{ $item->id }}" data-sal="{{ $item->salary }}" data-bon="{{ $item->bonus }}"
                        data-date="{{ $item->date }}" data-total="{{ $item->total }}">
                        Edit
                    </button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delSal"
                        data-sal_id="{{ $item->id }}">
                        Delete
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
    @include('template.addModal')
    @include('template.editModal')
    @include('template.deleteModal')
    @include('template.logoutModal')
@endsection
