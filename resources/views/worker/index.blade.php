@extends('layouts.main')
@section('content')
    <div class="container">
        <h2>All Workers</h2>
        <a class="btn btn-primary mb-5 mt-2" href="{{route('worker.create')}}" role="button">Add worker</a>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">surname</th>
                <th scope="col">department</th>
                <th scope="col">position</th>
                <th scope="col">salary</th>
            </tr>
            </thead>
            <tbody>
            @foreach($workers as $worker)
                <tr>
                    <th scope="row">{{$worker->id}}</th>
                    <td><a href="{{route('worker.show', $worker->id)}}">{{$worker->name}}</a></td>
                    <td>{{$worker->surname}}</td>
                    <td>{{$worker->department}}</td>
                    <td>{{$worker->position}}</td>
                    <td>{{$worker->salary}} Рублей</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
