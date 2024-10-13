@extends('viewOwner.template')
@section('konten')
    <!-- Begin Page Content -->
    
    <thead>
        <tr>
            <th scope="col">No ID</th>
            <th scope="col">Name</th>
            <th scope="col">Position</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Telephone</th>
            <th scope="col">Username</th>
            
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($data as $item)
        
            <tr>
                <td scope ="row">{{ $i++ }}</td>
                <td scope ="row">{{ $item->name }}</td>
                <td scope ="row">{{ $item->position }}</td>
                <td>{{ date('d F Y', strtotime($item->dob)) }}</td>
                <td scope ="row">{{ $item->telephone }}</td>
                <td scope ="row">{{ $item->username }}</td>
            </tr>
        @endforeach
    </tbody>
    </table>
    @include('template.logoutModal')
@endsection
