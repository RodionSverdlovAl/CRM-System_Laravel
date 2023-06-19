@extends('layouts.admin')
@section('content')
    <div class="container">
        <h2>Список сотрудников</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Имя</th>
                <th scope="col">Фамилия</th>
                <th scope="col">Должность</th>
                <th scope="col">Почта</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->surname}}</td>
                    <td>
                        @foreach($positions as $position)
                            {{ $employee->position_id == $position->id ? $position->title : '' }}
                        @endforeach
                    </td>
                    <td>{{$employee->email}}</td>
                    <td><a href="{{route('admin.employee.show', $employee->id)}}" type="button" class="btn btn-info">перейти</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
