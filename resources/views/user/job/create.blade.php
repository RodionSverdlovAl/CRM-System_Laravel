@extends('layouts.user')
@section('content')
    <div class="container">
        <h2>Учет выполненной работы</h2>

        <form action="{{route('job.store')}}" method="post">
            @csrf
            <div class="row mb-3">
                <label for="service" class="col-md-4 col-form-label text-md-end">Выберите услугу которую вы выполнили</label>
                <div class="col-md-6">
                    <select class="form-select"  id="service" name="service_id">
                        @foreach($services as $service)
                            <option value={{$service->id}}>{{$service->title}}</option>
                        @endforeach
                    </select>
                    @error('service')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="complexity" class="col-md-4 col-form-label text-md-end">Выберите сложность работы</label>
                <div class="col-md-6">
                    <select class="form-select"  id="complexity" name="complexity">
                        <option value="1">Обычная сложность</option>
                        <option value="2">Средняя сложность</option>
                        <option value="3">Высокая сложность</option>
                    </select>
                    @error('complexity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="month" class="col-md-4 col-form-label text-md-end">Выберите месяц</label>
                <div class="col-md-6">
                    <select class="form-select"  id="month" name="month">
                        <option value="1">Январь</option>
                        <option value="2">Февраль</option>
                        <option value="3">Март</option>
                        <option value="4">Апрель</option>
                        <option value="5">Май</option>
                        <option value="6">Июнь</option>
                        <option value="7">Июль</option>
                        <option value="8">Август</option>
                        <option value="9">Сентябрь</option>
                        <option value="10">Октябь</option>
                        <option value="11">Ноябрь</option>
                        <option value="12">Декабрь</option>
                    </select>
                    @error('month')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3" style="display:flex">
                <div>
                    <label class="form-label">Укажите затраченное время на выполнение данной услуги (в минутах)</label>
                </div>
                <div>
                    <input type="number" name="work_time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('work_time')}}">
                </div>

                @error('work_time')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Добавить выполненную работу</button>
        </form>
    </div>
@endsection
