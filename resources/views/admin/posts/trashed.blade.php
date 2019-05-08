@extends('admin.index')
@section('menu')
    <a href="{{route('admin.users.index')}}" class="nav-link">Users</a>
    <a href="{{route('admin.posts.index')}}" class="nav-link">Posts</a>
    <a href="" class="nav-link">Categories</a>
    <a href="" class="nav-link">Tags</a>
    <a href="{{route('admin.posts.trashed')}}" class="nav-link active">Trashed Posts</a>
@endsection

@section('content')
    <h3>Posts Control Panel</h3>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped w-100 table-borderless table-hoverable">
            <thead>
                <th class="pl-2">Id</th>
                <th>Title</th>
                <th>Owner</th>
                <th>Deleted At</th>
                <th class="pr-2">Actions</th>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td class="pl-2">{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->deleted_at}}</td>
                        <td class="pr-2">
                            <p>
                                <button class="w-100 mt-3 btn btn-sm btn-primary" type="button" data-toggle="collapse" data-target="#user_{{$post->id}}" aria-expanded="false" aria-controls="collapseExample">
                                    ACTIONS
                                </button>
                            </p>
                            <div class="collapse" id="user_{{$post->id}}">
                                <div style="background: none; border:none" class="card card-body px-0 pt-0">

                                    <a href="{{route('admin.posts.restore', ['post'=> $post->id])}}" class="btn btn-sm btn-success">Restore Post</a>
                                    <a href="{{route('admin.posts.forceDelete', ['post'=> $post->id])}}" class="btn btn-sm btn-danger mt-1">Truncate Post</a>


                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection