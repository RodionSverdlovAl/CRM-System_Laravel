@extends('layouts.admin')
@section('content')
    <div class="container">
        <h2>Диаграмма услуг по колличеству выполненных работ</h2>

        <div class="row mb-3">
            <a class="mr-2" href="{{route('admin.statistic.PieChartServices')}}">За все время</a>
            <label for="month" class="col-md-4 col-form-label text-md-end">Выберите месяц</label>
            <div style="display:flex">
                <a class="mr-2" href="{{route('admin.statistic.PieChartServices.filterable',['month' => '1'])}}">Январь</a>
                <a class="mr-2" href="{{route('admin.statistic.PieChartServices.filterable',['month' => '2'])}}">Февраль</a>
                <a class="mr-2" href="{{route('admin.statistic.PieChartServices.filterable',['month' => '3'])}}">Март</a>
                <a class="mr-2" href="{{route('admin.statistic.PieChartServices.filterable',['month' => '4'])}}">Апрель</a>
                <a class="mr-2" href="{{route('admin.statistic.PieChartServices.filterable',['month' => '5'])}}">Май</a>
                <a class="mr-2" href="{{route('admin.statistic.PieChartServices.filterable',['month' => '6'])}}">Июнь</a>
                <a class="mr-2" href="{{route('admin.statistic.PieChartServices.filterable',['month' => '7'])}}">Июль</a>
                <a class="mr-2" href="{{route('admin.statistic.PieChartServices.filterable',['month' => '8'])}}">Август</a>
                <a class="mr-2" href="{{route('admin.statistic.PieChartServices.filterable',['month' => '9'])}}">Сентябрь</a>
                <a class="mr-2" href="{{route('admin.statistic.PieChartServices.filterable',['month' => '10'])}}">Октябрь</a>
                <a class="mr-2" href="{{route('admin.statistic.PieChartServices.filterable',['month' => '11'])}}">Ноябрь</a>
                <a class="mr-2" href="{{route('admin.statistic.PieChartServices.filterable',['month' => '12'])}}">Декабрь</a>
            </div>
        </div>

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
                    title: 'Услуги по нарядам',
                    is3D: true,
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                chart.draw(data, options);
            }
        </script>
        <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
    </div>
@endsection
