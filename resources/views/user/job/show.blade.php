@extends('layouts.admin')
@section('content')
    <div class="container">
    <div class="card" style="height: 80vh">
        <div class="card-header">
            {{$service->title}}
        </div>
        <div class="card-body">
            <p>Номер работы: {{$job->id}}</p>
            <h5 class="card-title">Мастер: {{$employee->surname.' '. $employee->name}}</h5><br>
            <h5 class="card-title">Должность: {{$position->title}}</h5>
            <p class="card-text">Время выполнения работы : {{$job->work_time}} мин.</p>
            <p class="card-text">Номер месяца выполнения : {{$job->month}}</p>
            <p class="card-text">Цена услуги: {{$service->price}} BYN</p>
        </div>
    </div>

@endsection
