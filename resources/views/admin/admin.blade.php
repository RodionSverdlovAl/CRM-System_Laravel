@extends('layouts.admin')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{count($jobs)}}</h3>
                        <p>Выполненные работы</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{count($positions)}}</h3>

                        <p>Должности</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>

                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{count($employees)}}</h3>

                        <p>Работники</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>

                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{count($services)}}</h3>

                        <p>Услуги</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>

                </div>
            </div>
        </div>
        <a href="{{route('companyIncomeStatistic')}}">Перейти к статистике компании</a>
        <div class="card-body" style="display: flex">
            <div>
                <table class="table table-bordered mr-5" style="width: 300px">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Сотрудники</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{$employee->id}}</td>
                            <td><a href="{{route('admin.employee.show', $employee->id)}}">{{$employee->surname . ' ' . $employee->name}}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                <table class="table table-bordered" style="width: 360px">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Услуги</th>
                        <th>Стоимость</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($services as $service)
                        <tr>
                            <td>{{$service->id}}</td>
                            <td>{{$service->title}}</td>
                            <td>{{$service->price}} BYN</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
