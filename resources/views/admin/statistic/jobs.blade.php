@extends('layouts.admin')
@section('content')
    <div class="container">
        <h2>Статистика выполненных работ по всей компании по месяцам</h2>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load("current", {packages:['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ["Element", "Наряды", { role: "style" } ],
                    <?php echo $fullIncome; ?>
                ]);

                var view = new google.visualization.DataView(data);
                view.setColumns([0, 1,
                    { calc: "stringify",
                        sourceColumn: 1,
                        type: "string",
                        role: "annotation" },
                    2]);

                var options = {
                    title: "Выполненные работы по месяцам",
                    width: 1000,
                    height: 600,
                    bar: {groupWidth: "95%"},
                    // legend: { position: "none" },
                };
                var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
                chart.draw(view, options);
            }
        </script>
        <div id="columnchart_values" style="width: 1000px; height: 600px;"></div>
    </div>

@endsection
