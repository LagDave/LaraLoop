@extends('admin.index')
@section('menu')
    <a href="{{route('admin.users.index')}}" class="nav-link">Users</a>
    <a href="{{route('admin.posts.index')}}" class="nav-link">Posts</a>
    <a href="{{route('admin.categories.index')}}" class="nav-link active">Categories</a>
    <a href="" class="nav-link">Tags</a>
    <a href="{{route('admin.posts.trashed')}}" class="nav-link">Trashed Posts</a>
@endsection
@section('content')
    <h4>Update Category</h4>
    <hr>
    <form action="{{route('admin.categories.update', ['category'=>$category->id])}}" method="POST" class="form">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label>Name</label>
            <input type="text" value="{{old('name')?? $category->name}}" name='name' class="form-control">
            @if($errors->has('name'))
                <small class="text-danger"><b><i class="fas fa-exclamation"></i> {{$errors->first('name')}}</b></small>
            @endif
        </div>

        <button class="btn btn-primary form-control">Update</button>
    </form>
    <br>
    <h4>Category's Posts</h4>
    <hr>
    <div class="table-responsive">
        <table style="overflow-x:scroll" class="table table-borderless w-100 table-striped table-hoverable">
            <thead>
            <th class="pl-2">Id</th>
            <th>Title</th>
            <th>Owner</th>
            <th>Category</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th class="pr-2">Actions</th>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td class="pl-2 pb-0">{{$post->id}}</td>
                    <td class="pb-0">{{$post->title}}</td>
                    <td class="pb-0">{{$post->user->name}}</td>
                    <td class="pb-0">{{$post->category->name}}</td>
                    <td class="pb-0">{{$post->created_at}}</td>
                    <td class="pb-0">{{$post->updated_at}}</td>
                    <td class="pr-2 pb-0">
                        <p>
                            <button class="w-100 btn btn-sm btn-primary" type="button" data-toggle="collapse" data-target="#user_{{$post->id}}" aria-expanded="false" aria-controls="collapseExample">
                                ACTIONS
                            </button>
                        </p>
                        <div class="collapse" id="user_{{$post->id}}">
                            <div style="background: none; border:none" class="card card-body px-0 pt-0">

                                <a href="{{route('admin.posts.edit', ['post'=>$post->id])}}" class="btn btn-sm btn-success">Edit Post</a>
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
@endsection