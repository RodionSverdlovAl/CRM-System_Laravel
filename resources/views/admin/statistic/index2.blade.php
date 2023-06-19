@extends('layouts.admin')
@section('content')
    <div class="container">
        <h2>Расчет сдельной заработной платы для всех сотрудников</h2>
        <div class="row mb-3">
            <a class="mr-2" href="{{route('admin.statistic.index2')}}">За все время</a>
            <label for="month" class="col-md-4 col-form-label text-md-end">Выберите месяц</label>
            <div style="display:flex">
                <a class="mr-2" href="{{route('admin.statistic.filterable.index2',['month' => '1'])}}">Январь</a>
                <a class="mr-2" href="{{route('admin.statistic.filterable.index2',['month' => '2'])}}">Февраль</a>
                <a class="mr-2" href="{{route('admin.statistic.filterable.index2',['month' => '3'])}}">Март</a>
                <a class="mr-2" href="{{route('admin.statistic.filterable.index2',['month' => '4'])}}">Апрель</a>
                <a class="mr-2" href="{{route('admin.statistic.filterable.index2',['month' => '5'])}}">Май</a>
                <a class="mr-2" href="{{route('admin.statistic.filterable.index2',['month' => '6'])}}">Июнь</a>
                <a class="mr-2" href="{{route('admin.statistic.filterable.index2',['month' => '7'])}}">Июль</a>
                <a class="mr-2" href="{{route('admin.statistic.filterable.index2',['month' => '8'])}}">Август</a>
                <a class="mr-2" href="{{route('admin.statistic.filterable.index2',['month' => '9'])}}">Сентябрь</a>
                <a class="mr-2" href="{{route('admin.statistic.filterable.index2',['month' => '10'])}}">Октябрь</a>
                <a class="mr-2" href="{{route('admin.statistic.filterable.index2',['month' => '11'])}}">Ноябрь</a>
                <a class="mr-2" href="{{route('admin.statistic.filterable.index2',['month' => '12'])}}">Декабрь</a>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Фамилия Имя</th>
                <th scope="col">Должность</th>
                <th scope="col">Кол-во часов</th>
                <th scope="col">Кол-во работ</th>
                <th scope="col">Итоговая сумма</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr>
                    <td style="color: {{$item['count_rebukes'] > 0 ? 'red' : 'green'}}">{{$item['employee']}}</td>
                    <td style="color: {{$item['count_rebukes'] > 0 ? 'red' : 'green'}}">{{$item['position']}}</td>
                    <td style="color: {{$item['count_rebukes'] > 0 ? 'red' : 'green'}}">{{$item['count_hour']}}</td>
                    <td style="color: {{$item['count_rebukes'] > 0 ? 'red' : 'green'}}">{{$item['count_jobs']}}</td>
                    <td style="color: {{$item['count_rebukes'] > 0 ? 'red' : 'green'}}">{{round($item['sum'],2)}} BYN</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
