@extends('admin.index')

@section('content')
    <div class="card card-body shadow b-radius-10 b-none">
        <h4><span class="text-primary"><i class="fas fa-stream"></i></span><b> Categories Control Panel</b></h4>
        <br>
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
    </div>
    <br>
    <div class="card b-none card-body shadow">
        {{$categories->links()}}
    </div>

@endsection