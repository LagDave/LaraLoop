@extends('admin.index')
@section('menu')
    <a href="{{route('admin.users.index')}}" class="nav-link">Users</a>
    <a href="{{route('admin.posts.index')}}" class="nav-link">Posts</a>
    <a href="{{route('admin.categories.index')}}" class="nav-link">Categories</a>
    <a href="" class="nav-link">Tags</a>
    <a href="{{route('admin.posts.trashed')}}" class="nav-link active">Trashed Posts</a>
@endsection

@section('content')
    <h4>Posts Control Panel</h4>
    <hr>

    <div class="accordion" id="accordionExample">
        @foreach($posts as $post)
            <div class="card">
                <div data-toggle="collapse" data-target="#post_{{$post->id}}" class="card-header hovered" id="headingOne">
                    <p class="text-primary">
                        {{$post->title}}
                        <small class="text-muted"><b>{{$post->user->name }}:</b> ( {{$post->created_at}} )</small>
                    </p>
                </div>

                <div id="post_{{$post->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <p>Category: <b>{{$post->category->name}}</b></p>
                        <p>Created at: <b>{{date('F d, Y', strtotime($post->created_at))}}</b></p>
                        <p>Updated at: <b>{{date('F d, Y', strtotime($post->updated_at))}}</b></p>
                        <hr>
                        <div class="btn-group">
                            <a href="{{route('admin.posts.restore', ['post'=> $post->id])}}" class="btn btn-sm btn-success">Restore Post</a>
                            <a href="{{route('admin.posts.forceDelete', ['post'=> $post->id])}}" class="btn btn-sm btn-danger">Truncate Post</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection