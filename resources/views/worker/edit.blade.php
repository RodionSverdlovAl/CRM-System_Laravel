@extends('layouts.main')
@section('content')
    <div class="container">
        <h4>Edit Worker</h4>

        <form action="{{route('worker.update', $worker->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label class="form-label">Worker name</label>
                <input type="text" value="{{$worker->name}}" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label class="form-label">Worker surname</label>
                <input type="text" value="{{$worker->surname}}" name="surname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label class="form-label">Worker department</label>
                <input type="text" value="{{$worker->department}}" name="department" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label class="form-label">Worker position</label>
                <input type="text" value="{{$worker->position}}" name="position" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label class="form-label">Worker salary</label>
                <input type="number" value="{{$worker->salary}}" name="salary" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">edit worker</button>
        </form>
    </div>
@endsection
