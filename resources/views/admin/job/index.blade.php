@extends('layouts.admin')
@section('content')
    <div class="container">
        <h2>Список выполненных нарядов</h2>
        <div class="row mb-3">
            <a class="mr-2" href="{{route('admin.job.index')}}">За все время</a>
            <label for="month" class="col-md-4 col-form-label text-md-end">Выберите месяц</label>
            <div style="display:flex">
                <a class="mr-2" href="{{route('admin.job.index.filterable',['month' => '1'])}}">Январь</a>
                <a class="mr-2" href="{{route('admin.job.index.filterable',['month' => '2'])}}">Февраль</a>
                <a class="mr-2" href="{{route('admin.job.index.filterable',['month' => '3'])}}">Март</a>
                <a class="mr-2" href="{{route('admin.job.index.filterable',['month' => '4'])}}">Апрель</a>
                <a class="mr-2" href="{{route('admin.job.index.filterable',['month' => '5'])}}">Май</a>
                <a class="mr-2" href="{{route('admin.job.index.filterable',['month' => '6'])}}">Июнь</a>
                <a class="mr-2" href="{{route('admin.job.index.filterable',['month' => '7'])}}">Июль</a>
                <a class="mr-2" href="{{route('admin.job.index.filterable',['month' => '8'])}}">Август</a>
                <a class="mr-2" href="{{route('admin.job.index.filterable',['month' => '9'])}}">Сентябрь</a>
                <a class="mr-2" href="{{route('admin.job.index.filterable',['month' => '10'])}}">Октябрь</a>
                <a class="mr-2" href="{{route('admin.job.index.filterable',['month' => '11'])}}">Ноябрь</a>
                <a class="mr-2" href="{{route('admin.job.index.filterable',['month' => '12'])}}">Декабрь</a>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Номер</th>
                <th scope="col">Фамилия Имя</th>
                <th scope="col">Должность</th>
                <th scope="col">Услуга</th>
                <th scope="col">Сложность</th>
                <th scope="col">Время</th>
                <th scope="col">Месяц</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($jobs as $job)
                <tr>
                    <td>{{$job->id}}</td>
                    <td>
                        @foreach($employees as $employee)
                            {{$job->user_id == $employee->id ? $employee->surname .' '. $employee->name : ''}}
                        @endforeach
                    </td>
                    <td>
                        @foreach($employees as $employee)
                            @if($job->user_id == $employee->id )
                                @foreach($positions as $position)
                                    {{ $employee->position_id == $position->id ? $position->title : '' }}
                                @endforeach
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach($services as $service)
                            {{$job->service_id == $service->id ? $service->title : ''}}
                        @endforeach
                    </td>
                    <td>{{$job->complexity == 1 ? "Базовая" : "Сложная"}}</td>
                    <td>{{$job->work_time}} мин.</td>
                    <td>{{$job->month}}</td>
                    <td>
                        <a href="{{route('admin.job.show', $job->id)}}" type="button" class="btn btn-info">подробнее</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mt-3">
            {{$jobs->withQueryString()->links()}}
        </div>
    </div>

@endsection
