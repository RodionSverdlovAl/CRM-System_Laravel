@extends('layouts.main')
@section('content')
    <div class="container">
        <h2>This is Posts page</h2>
        <a class="btn btn-primary mb-5 mt-2" href="{{route('post.create')}}" role="button">Create post</a>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">likes</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td><a href="{{route('post.show', $post->id)}}">{{$post->title}}</a></td>
                    <td>{{$post->body}}</td>
                    <td>{{$post->likes}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mt-3">
            {{$posts->links()}}
        </div>
    </div>

@endsection
