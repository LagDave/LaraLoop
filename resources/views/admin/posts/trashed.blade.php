@extends('admin.index')
@section('content')
    <div class="card card-body shadow b-radius-10 b-none">
        <h4><span class="text-primary"><i class="fas fa-trash-alt"></i></span><b> Trashed Posts Control Panel</b></h4>
        <br>

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
                                <a href="{{route('admin.posts.restore', ['post'=> $post->id])}}" class="btn btn-success"><i class="fas fa-trash-restore"></i></a>
                                <a href="{{route('admin.posts.forceDelete', ['post'=> $post->id])}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <br>
    <div class="card b-none card-body shadow">
        {{$posts->links()}}
    </div>

@endsection