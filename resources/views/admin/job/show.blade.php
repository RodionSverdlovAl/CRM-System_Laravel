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
            <a href="{{route('admin.employee.show',$employee->id)}}" class="btn btn-primary">Перейти к рабочему</a>
            <a href="{{route('admin.job.index')}}" class="btn btn-primary">Вернуться назад</a>

            <form action="{{route('admin.job.delete',$job->id)}}" method="post" class="mt-2">
                @csrf
                @method('delete')
                <button  type="submit" class="btn btn-danger btn-block"><b>Удалить из учета</b></button>
            </form>
        </div>
    </div>

@endsection
