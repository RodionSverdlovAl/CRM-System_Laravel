@extends('layouts.admin')
@section('content')
    <div class="container">
        <h2>Диаграмма отношения сотрудников по должностям</h2>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    <?php echo $data; ?>
                ]);

                var options = {
                    title: 'Сотрудники по должностям',
                    is3D: true,
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                chart.draw(data, options);
            }
        </script>
        <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
    </div>
@endsection
