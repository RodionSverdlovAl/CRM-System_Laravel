@extends('layouts.admin')
@section('content')
    <div class="container">
        <h2>Редактирование услуги</h2>

        <form action="{{route('admin.service.update', $service->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label class="form-label">Название услуги</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$service->title}}">
                @error('title')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Цена услуги (руб)</label>
                <input type="number" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$service->price}}">
                @error('price')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Редактировать</button>
        </form>
    </div>
@endsection
