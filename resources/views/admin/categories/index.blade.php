@extends('admin.index')
@section('menu')
    <a href="{{route('admin.users.index')}}" class="nav-link">Users</a>
    <a href="{{route('admin.posts.index')}}" class="nav-link">Posts</a>
    <a href="{{route('admin.categories.index')}}" class="nav-link active">Categories</a>
    <a href="" class="nav-link">Tags</a>
    <a href="{{route('admin.posts.trashed')}}" class="nav-link">Trashed Posts</a>
@endsection
@section('content')

    <h4>Categories Control Panel</h4>
    <hr>
        <div class="table-responsive">
            <table class="table w-100 table-hovered table-striped table-borderless">
                <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Number of Posts</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{sizeof($category->posts)}}</td>
                            <td>
                                <p>
                                    <button class="w-100 btn btn-sm btn-primary" type="button" data-toggle="collapse" data-target="#user_{{$category->id}}" aria-expanded="false" aria-controls="collapseExample">
                                        ACTIONS
                                    </button>
                                </p>
                                <div class="collapse" id="user_{{$category->id}}">
                                    <div style="background: none; border:none" class="px-0 pt-0">

                                        <a href="{{route('admin.categories.edit', ['category'=>$category->id])}}" class="w-100 btn btn-sm btn-success">Edit Category</a>

                                        <form method="POST" action="{{route('admin.categories.destroy', ['category'=>$category->id])}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn w-100 btn-sm btn-danger mt-1">Delete Category</button>
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
{{$categories->links()}}

@endsection