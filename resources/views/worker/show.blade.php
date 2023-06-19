@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="card text-bg-primary mb-3 mt-5" style="max-width: 18rem;">
            <div class="card-header">{{$worker->name}} {{$worker->surname}}</div>
            <div class="card-body">
                <h5 class="card-title">{{$worker->department}}</h5>
                <p class="card-text">{{$worker->position}}</p>
                <p class="card-text">{{$worker->salary}} рублей</p>
            </div>
        </div>
        <a href="{{route('worker.edit', $worker->id)}}" class="card-link m-lg-3">Edit worker</a>
        <a href="{{route('workers.index')}}" class="card-link">Back</a>
        <form action="{{route('worker.delete', $worker->id)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger mt-3">Delete</button>
        </form>
    </div>
@endsection
