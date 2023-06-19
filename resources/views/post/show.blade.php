@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                <p class="card-text">{{$post->body}}</p>
                <a href="{{route('post.edit', $post->id)}}" class="card-link">Edit post</a>
                <a href="{{route('posts.index')}}" class="card-link">Back</a>
                <form action="{{route('post.delete', $post->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger mt-3">Delete</button>
                </form>
            </div>
        </div>
    </div>

@endsection
