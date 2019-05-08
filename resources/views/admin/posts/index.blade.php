@extends('admin.index')
@section('menu')
    <a href="{{route('admin.users.index')}}" class="nav-link">Users</a>
    <a href="{{route('admin.posts.index')}}" class="nav-link active">Posts</a>
    <a href="" class="nav-link">Categories</a>
    <a href="" class="nav-link">Tags</a>
    <a href="{{route('admin.posts.trashed')}}" class="nav-link">Trashed Posts</a>
@endsection

@section('content')

    <h3>Posts Control Panel</h3>
    <hr>
    <div class="table-responsive">
        <table style="overflow-x:scroll" class="table table-borderless w-100 table-striped table-hoverable">
            <thead>
                <th class="pl-2">Id</th>
                <th>Title</th>
                <th>Owner</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th class="pr-2">Actions</th>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td class="pl-2">{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>{{$post->updated_at}}</td>
                    <td class="pr-2">
                        <p>
                            <button class="w-100 mt-3 btn btn-sm btn-primary" type="button" data-toggle="collapse" data-target="#user_{{$post->id}}" aria-expanded="false" aria-controls="collapseExample">
                                ACTIONS
                            </button>
                        </p>
                        <div class="collapse" id="user_{{$post->id}}">
                            <div style="background: none; border:none" class="card card-body px-0 pt-0">

                                <button class="btn btn-sm btn-success">Edit Post</button>
                                <form method="POST" action="{{route('admin.posts.destroy', ['post'=>$post->id])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn w-100 btn-sm btn-danger mt-1">Trash Post</button>
                                </form>


                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <hr>
    {{$posts->links()}}

@endsection