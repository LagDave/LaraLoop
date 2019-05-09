@extends('admin.index')
@section('content')

    <h3>Edit Post</h3>
    <hr>
    <form method="POST" action="{{route('admin.posts.update', ['post'=>$post->id])}}" class="form">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" value="{{old('title') ?? $post->title}}" class="form-control">
            @if($errors->has('title'))
                <small class="text-danger"><b><i class="fas fa-exclamation"></i> {{$errors->first('title')}}</b></small>
            @endif
        </div>
        <div class="form-group">
            <label>Body</label>
            <textarea name="body" rows="10" class="form-control">{{old('body') ?? $post->body}}</textarea>
            @if($errors->has('body'))
                <small class="text-danger"><b><i class="fas fa-exclamation"></i> {{$errors->first('body')}}</b></small>
            @endif
        </div>
        <button class="btn btn-primary form-control">UPDATE</button>
    </form>
    
@endsection
