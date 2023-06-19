@extends('layouts.admin')
@section('content')
    <div class="container">
        <h2>Создание должности</h2>

        <form action="{{route('position.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Название должности</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('title')}}">
                @error('title')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Почасовая оплата труда (руб)</label>
                <input type="number" name="salary" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('salary')}}">
                @error('salary')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Создать должность</button>
        </form>
    </div>
@endsection
