<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary Slip</title>
    <style>
        /* Style untuk slip gaji */
        .salary-slip {
            font-family: Arial, sans-serif;
            margin: 0 auto;
            max-width: 600px;
            padding: 20px;
            border: 1px solid #ccc;
        }

        .salary-slip h2 {
            text-align: center;
        }

        .employee-info {
            margin-bottom: 20px;
        }

        .employee-info div {
            margin-bottom: 10px;
        }

        .salary-details {
            border-top: 1px solid #ccc;
            margin-top: 30px;
            padding-top: 30px;
        }

        .salary-details table {
            width: 100%;
            border-collapse: collapse;
        }

        .salary-details th,
        .salary-details td {
            border-bottom: 1px solid #ccc;
            text-align: left;
        }

        .letterhead {
            background-color: #f0f0f0;
            border-bottom: 1px solid black;/ text-align: center;
            padding-bottom: 10px;

        }

        .logo {
            margin-bottom: -30px;
            margin-top: -40px;
        }

        .logo img {
            width: 80px;
            /* Sesuaikan ukuran logo sesuai kebutuhan */
        }

        .course-name {
            font-size: 15px;
            font-weight: bold;
        }

        .address {
            font-size: 10px;
            margin-bottom: 10px;
        }

        .course-info {
            font-size: 10px;

        }

        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .center {
            text-align: right;
            margin-right: 50px;
            padding-top: 40px;
        }

        .signature {
            width: 200px;
            height: 100px;
            border: 1px solid #000;
            margin: 20px auto;
        }
    </style>
</head>

<body>
    @php
        $found = false; // Variable to track if the salary data is found
    @endphp
    {{-- mengambil data paling akhir yang ditambahkan --}}
    @foreach ($dtSal->sortByDesc('date') as $item)
        @if ($item->id_employees == Auth::guard('emp')->user()->id)
            @php
                $found = true; // Set to true if salary data is found
            @endphp
            <div class="salary-slip" style="page-break-before: always;">
                <body>
                    <div class="letterhead">
                        <div class="logo">
                            <img src="img/kop/kop.jpg" alt="course Logo">
                        </div>
                        <div class="course-info">
                            <div class="course-name">FASTBRIDGE ENGLISH</div>
                            <div class="address">Ruko Thamrin Boulevard, Jl. MH. Thamrin Jl.
                                Cikarang Baru Raya No.66 Blok A, Jababeka, Kec. Cikarang Tim.,
                                Kabupaten Bekasi, Jawa Barat</div>
                            <div>Phone Number: +62 856 9181 4088</div>
                            <div>Instagram: Fastbridge_English</div>
                        </div>
                    </div>
                    <h3 style="text-align: center;">Salary Slip</h3>
                    <div class="employee-info">
                        <div><strong>Name:</strong> {{ $item->employee->name }}</div>
                        <div><strong>Date:</strong> {{ date('d F Y', strtotime($item->date)) }}</div>

                    </div>
                    <div class="salary-details">

                        <body>
                    </div>
                    <table>
                        <tbody>
                            <tr>
                                <td><strong>Description</strong></td>
                                <td>:</td>
                                <td><strong>Amounts (Rp)</strong></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Basic Salary</td>
                                <td>:</td>
                                <td>Rp. {{number_format( $item->salary) }}</td>
                            </tr>
                            <tr>
                                <td>Bonus </td>
                                <td>:</td>
                                <td>Rp. {{number_format( $item->bonus) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Total</strong></td>
                                <td>:</td>
                                <td><strong>Rp. {{number_format( $item->total) }}</strong></td>
                            
                            </tr>
                        </tbody>
                    </table>

            </div>
            </div>
        @break
    @endif
@endforeach

@if (!$found)
    <div class="salary-slip" style="page-break-before: always;">

        <body>
            <div class="letterhead">
                <div class="logo">
                    <img src="img/kop/kop.jpg" alt="course Logo">
                </div>
                <div class="course-info">
                    <div class="course-name">FASTBRIDGE ENGLISH</div>
                    <div class="address">Ruko Thamrin Boulevard, Jl. MH. Thamrin Jl.
                        Cikarang Baru Raya No.66 Blok A, Jababeka, Kec. Cikarang Tim.,
                        Kabupaten Bekasi, Jawa Barat</div>
                    <div>Phone Number: +62 856 9181 4088</div>
                    <div>Instagram: Fastbridge_English</div>
                </div>
            </div>
            <h3 style="text-align: center;">Salary Slip</h3>
            <div class="employee-info">
                <div><strong>Name:</strong> {{ Auth::guard('emp')->user()->name }}</div>
                <div><strong>Date:</strong> {{ date('d F Y', strtotime($item->date)) }}</div>

            </div>
            <div class="salary-details">

                <body>
            </div>
            <table>
                <tbody>
                    <tr>
                        <td><strong>Description</strong></td>
                        <td>:</td>
                        <td><strong>Amounts (Rp)</strong></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Basic Salary</td>
                        <td>:</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>Bonus Salary</td>
                        <td>:</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td><strong>Total Salary</strong></td>
                        <td>:</td>
                        <td><strong>0</strong></td>
                    </tr>
                </tbody>
            </table>

    </div>
    </div>
@endif

<div class="container">
    <div class="center" style="text-align: right;">
        <p> <?php echo date('d F Y'); ?></p>
    </div>
    <div class="center" style="text-align: right;">
        <p>Farah Novia</p>
    </div>
</div>

</body>

</html>

<script type="text/javascript">
    window.print();
</script>
