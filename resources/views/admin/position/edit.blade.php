@extends('layouts.admin')
@section('content')
    <div class="container">
        <h2>Создание должности</h2>

        <form action="{{route('admin.position.update', $position->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label class="form-label">Название должности</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$position->title}}">
                @error('title')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Почасовая оплата труда (руб)</label>
                <input type="number" name="salary" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$position->salary}}">
                @error('salary')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Редактировать должность</button>
        </form>
    </div>
@endsection
