@extends('admin.index')
@section('menu')
    <a href="{{route('admin.users.index')}}" class="nav-link">Users</a>
    <a href="{{route('admin.posts.index')}}" class="nav-link active">Posts</a>
    <a href="" class="nav-link">Categories</a>
    <a href="" class="nav-link">Tags</a>
    <a href="{{route('admin.posts.trashed')}}" class="nav-link">Trashed Posts</a>
@endsection
@section('content')

    <h3>Edit Post</h3>
    <hr>
    <form method="POST" action="{{route('admin.posts.update', ['post'=>$post->id])}}" class="form">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" value="{{old('title') ?? $post->title}}" class="form-control">
        </div>
        <div class="form-group">
            <label>Body</label>
            <textarea name="body" rows="10" class="form-control">{{old('body') ?? $post->body}}</textarea>
        </div>
        <button class="btn btn-primary form-control">UPDATE</button>
    </form>
    
@endsection
