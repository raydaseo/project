@extends('viewOwner.template')
@section('konten')

<div class="text-center mb-3">
    <a href="{{ ('reportView') }}" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right">
        <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
    </a>
</div>


<h4 align='center'>Graph of Expenditure for Employee Salaries</h4>
<div>
    <canvas id="myChart"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Aggregate data per month
    var monthlyData = {};
    <?php foreach($dtSal as $item) {?>
    var month = '<?php echo date('F Y', strtotime($item->date)); ?>';
    if (!monthlyData[month]) {
        monthlyData[month] = {
            total: 0
        };
    }
    monthlyData[month].total += <?php echo $item->salary + $item->bonus; ?>;
    <?php } ?>

    // Sort the months in chronological order
    var sortedMonths = Object.keys(monthlyData).sort(function(a, b) {
        return new Date(a) - new Date(b);
    });

    // Generate the chart using sorted months
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: sortedMonths, // Use sorted months here
            datasets: [{
                label: 'Total Salary + Bonus',
                data: sortedMonths.map(month => monthlyData[month].total),
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
@endsection
