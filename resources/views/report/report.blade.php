<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recapitulation Report</title>
    <style>
        /* CSS untuk styling laporan */
        .report-container {
            max-width: 800px; /* Sesuaikan dengan lebar kertas PDF */
            margin: 0 auto;
            padding: 20px;
        }
        .report-section {
            margin-bottom: 20px;
        }

        .report-section p {
            font-weight: bold;
        }

        .report-section table {
            width: 100%;
            border-collapse: collapse;
        }

        .report-section th,
        .report-section td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .report-section th {
            background-color: #ffffff;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .letterhead {
            background-color: #ffffff;
            border-bottom: 1px solid black; /
            text-align: center;
            padding-bottom: 10px;
            
        }

        .logo {
            margin-bottom: -30px;
            margin-top: -30px;
        }

        .logo img {
            width: 150px;
            /* Sesuaikan ukuran logo sesuai kebutuhan */
        }

        .course-name {
            font-size: 24px;
            font-weight: bold;
        }

        .address {
            font-size: 16px;
            margin-bottom: 10px;
        }
    </style>
</head>

<script type="text/javascript">
    window.print();
</script>

<body>
    <div class="report-container">
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

    {{-- employee --}}
    <div class="report-section" >
        <p><b>List of Employee</b></p>
        <table class="table table-striped table-bordered" align="center">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Date of Birth</th>
                    <th>Telephone</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->position }}</td>
                        <td>{{ date('j F Y', strtotime($item->dob)) }}</td>
                        <td>{{ $item->telephone }}</td>
                        <td>{{ $item->username }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- report keseluruhan --}}
    <div class="report-section" style="page-break-before: always;">
        <h3>Recapitulation Report</h3>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Total Attendance</th>
                    <th>Total Leave</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $attendanceCountByName = []; // Array untuk menyimpan jumlah absen setiap nama
                ?>
                @foreach ($att as $item)
                    @if ($item->status == 'Accepted')
                        <?php
                        // Mendapatkan nama karyawan
                        $employeeName = $item->employee->name;
                        $leaveCountByName = [];
                        
                        // Mengecek apakah nama sudah ada dalam array, jika belum tambahkan dengan nilai 1, jika sudah tambahkan nilai 1
                        if (isset($attendanceCountByName[$employeeName])) {
                            $attendanceCountByName[$employeeName]++;
                        } else {
                            $attendanceCountByName[$employeeName] = 1;
                        }
                        ?>
                    @endif
                @endforeach

                {{-- leave --}}
                @foreach ($liv as $item)
                        @if ($item->status_owner == 'Accepted')
                            <?php
                            // Mendapatkan nama karyawan
                            $employeeName = $item->employee->name;
                            
                            // Mengecek apakah nama sudah ada dalam array leaves, jika belum tambahkan dengan nilai 1, jika sudah tambahkan nilai 1
                            if (isset($leaveCountByName[$employeeName])) {
                                $leaveCountByName[$employeeName]++;
                            } else {
                                $leaveCountByName[$employeeName] = 1;
                            }
                            ?>
                        @endif
                   
                @endforeach

                <?php $i = 1; ?>
                @foreach ($attendanceCountByName as $name => $count)
                <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $name }}</td>
                        <td>{{ $count }}</td>
                        <td>{{ isset($leaveCountByName[$name]) ? $leaveCountByName[$name] : 0 }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    {{-- salary --}}
    <div class="report-section" style="page-break-before: always;">
        <p><b>Salary</b></p>
        <table class="table table-striped table-bordered" align="center">
            <thead class="thead-dark">
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
                    @php
                        $date = strtotime($item->date);
                        $entryMonth = date('m', $date);
                    @endphp
                    @if ($entryMonth == date('m')) {{-- Memeriksa apakah data berada dalam bulan ini --}}
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $item->employee->name }}</td>
                            <td>Rp. {{number_format( $item->salary) }}</td>
                            <td>Rp. {{number_format( $item->bonus) }}</td>
                            <td>{{ date('j F Y', $date) }}</td>
                            <td><strong>Rp. {{number_format( $item->total) }}</strong></td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
