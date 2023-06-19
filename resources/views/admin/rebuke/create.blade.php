@extends('layouts.admin')
@section('content')
    <div class="container">
        <h2>Назначение выговора сотруднику ( {{$employee->name . ' '. $employee->surname}} )</h2>

        <form action="{{route('admin.rebuke.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Идентификационный номер работника</label>
                <input type="number" name="user_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$employee->id}}">
                @error('user_id')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Введите причину выговора</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('salary')}}">
                @error('title')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Введите дату</label>
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input name="date" type="text" class="form-control datetimepicker-input" data-target="#reservationdate">
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Назначить выговор</button>
        </form>
    </div>
@endsection
