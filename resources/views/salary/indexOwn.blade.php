@extends('viewOwner.template')
@section('konten')
<thead>
    <tr>
        <th scope="col">No</th>
        <th scope="col">Name</th>
        <th scope="col">Salary</th>
        <th scope="col">Bonus</th>
        <th scope="col">Date</th>
        <th scope="col">Total</th>
        
    </tr>
</thead>
<tbody>
    <?php $i = 1; ?>
    @foreach ($dtSal as $item)
        <tr>
            <td scope ="row">{{ $i++ }}</td>
            <td scope ="row">{{ $item->employee->name }}</td>
            <td scope ="row">Rp. {{number_format( $item->salary,2) }}</td>
            <td scope ="row">{{ $item->bonus }}</td>
            <td scope ="row">{{ $item->date }}</td>
            <td scope ="row">{{ $item->total }}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
    @include('template.logoutModal')
@endsection
