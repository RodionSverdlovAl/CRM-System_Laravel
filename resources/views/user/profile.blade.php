@extends('layouts.user')
@section('content')
    <div class="container">
        <h2 class="mb-2">Детальный просмотр сотрудника</h2>
        <h5 class="mb-4" style="color:grey">Email: {{$employee->email}}</h5>
        <div class="row">
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="https://cdn-icons-png.flaticon.com/512/2422/2422756.png" alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center">{{$employee->name . ' ' . $employee->surname}}</h3>
                        <p class="text-muted text-center">Номер: {{$employee->id}}</p>
                        <p class="text-muted text-center">Должность: {{$position->title}}</p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Выпол. работ</b> <a class="float-right">{{count($jobs)}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Кол-во выговоров</b> <a class="float-right">{{count($rebukes)}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Раб. время</b> <a class="float-right">{{round(($allWorkTime/60),1)}} ч.</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <h3>Выполненные работы</h3>
                <table class="table mb-4">
                    <thead>
                    <tr>
                        <th scope="col">Номер</th>
                        <th scope="col">Услуга</th>
                        <th scope="col">Сложность</th>
                        <th scope="col">Время</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($jobsForPrint as $job)
                        <tr>
                            <td>{{$job->id}}</td>
                            <td>
                                @foreach($services as $service)
                                    {{$job->service_id == $service->id ? $service->title : ''}}
                                @endforeach
                            </td>
                            <td>
                                @if($job->complexity == 1)
                                    Обычная
                                @endif
                                    @if($job->complexity == 2)
                                        Средняя
                                    @endif
                                    @if($job->complexity == 3)
                                        Высокая
                                    @endif
                            </td>
                            <td>{{$job->work_time}} мин.</td>
                            <td>
                                <a href="{{route('user.job.show', $job->id)}}" type="button" class="btn btn-info">подробнее</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-3">
                    {{$jobsForPrint->withQueryString()->links()}}
                </div>
                <h3>Дисциплинарные взыскания</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Номер</th>
                        <th scope="col">Причина</th>
                        <th scope="col">Дата</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rebukes as $rebuke)
                        <tr>
                            <td>{{$rebuke->id}}</td>
                            <td>{{$rebuke->title}}</td>
                            <td>{{$rebuke->date}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>

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

