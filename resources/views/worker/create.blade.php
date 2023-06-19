@extends('layouts.main')
@section('content')
    <div class="container">
        <h4>Add Worker</h4>

        <form action="{{route('worker.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Worker name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label class="form-label">Worker surname</label>
                <input type="text" name="surname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label class="form-label">Worker department</label>
                <input type="text" name="department" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label class="form-label">Worker position</label>
                <input type="text" name="position" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label class="form-label">Worker salary</label>
                <input type="number" name="salary" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Add worker</button>
        </form>
    </div>
@endsection
