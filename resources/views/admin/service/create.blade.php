@extends('layouts.admin')
@section('content')
    <div class="container">
        <h2>Создание услуги</h2>

        <form action="{{route('service.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Название услуги</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('title')}}">
                @error('title')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">базовая цена услуги (руб)</label>
                <input type="number" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('price')}}">
                @error('price')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Создать услугу</button>
        </form>
    </div>
@endsection
