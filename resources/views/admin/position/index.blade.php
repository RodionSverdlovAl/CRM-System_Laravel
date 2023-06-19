@extends('layouts.admin')
@section('content')
    <div class="container">
        <h2>Список должностей</h2>
        <a href="{{route('position.create')}}" type="button" class="btn btn-success mb-4 mt-2">Добавить должность</a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Номер должности</th>
                <th scope="col">Название</th>
                <th scope="col">руб/час</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($positions as $position)
                <tr>
                    <td>{{$position->id}}</td>
                    <td>{{$position->title}}</td>
                    <td>{{$position->salary}} Рублей в час</td>
                    <td><a href="{{route('admin.position.edit', $position->id)}}" type="button" class="btn btn-primary">изменить</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
