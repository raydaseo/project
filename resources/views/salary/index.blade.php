@extends('viewEmp.template')
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
    @if ($item->id_employees== Auth::guard('emp')->user()->id)
        <tr>
            <td scope ="row">{{ $i++ }}</td>
            <td scope ="row">{{ $item->employee->name }}</td>
            <td scope ="row">Rp. {{number_format( $item->salary,2) }}</td>
            <td scope ="row">Rp. {{number_format( $item->bonus,2) }}</td>
            <td scope="row">{{ date('d F Y', strtotime($item->date)) }}</td>
            <td scope ="row">Rp. {{number_format( $item->total,2) }}</td>
        </tr>
        @endif
        @endforeach
    </tbody>
    </table>
    @include('template.logoutModal')
@endsection
