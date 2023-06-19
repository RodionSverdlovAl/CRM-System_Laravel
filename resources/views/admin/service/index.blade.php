@extends('layouts.admin')
@section('content')
    <div class="container">
        <h2>Список услуг</h2>
        <a href="{{route('admin.service.create')}}" type="button" class="btn btn-success mb-4 mt-2">Добавить услугу</a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Номер</th>
                <th scope="col">Название услуги</th>
                <th scope="col">цена услуги (руб)</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($services as $service)
                <tr>
                    <td>{{$service->id}}</td>
                    <td>{{$service->title}}</td>
                    <td>{{$service->price}} Руб</td>
                    <td><a href="{{route('admin.service.edit', $service->id)}}" type="button" class="btn btn-primary">изменить</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
