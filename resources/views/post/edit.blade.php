@extends('layouts.main')
@section('content')
    <div class="container">
        <h4>Update post</h4>

        <form action="{{route('post.update', $post->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label class="form-label">Post Title</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$post->title}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Post Content</label>
                <textarea type="text" name="body" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">{{$post->body}}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Post image url</label>
                <input type="text" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$post->image}}">
            </div>
            <div class="mb-5">
                <label class="form-label" id="category">Category</label>
                <select class="form-select" id="category" name="category_id">
                    @foreach($categories as $category)
                        <option
                            {{$category->id === $post->category_id ? ' selected' : ''}}
                            value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" id="tags">Tags</label>
                <select class="form-select" id="tags" name="tags[]" multiple>
                    @foreach($tags as $tag)
                        <option
                            @foreach($post->tags as $postTag)
                            {{$tag->id === $postTag->id ? ' selected' : ''}}
                            @endforeach
                            value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
