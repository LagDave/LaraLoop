@extends('admin.index')

@section('content')
    <div class="card category-card card-body shadow b-radius-10 b-none">
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
                                    <div class="button-group">
                                        <a href="{{route('admin.categories.edit', ['category'=>$category->id])}}" class="btn btn-sm btn-success"><i class="fas fa-pen-alt"></i></a>

                                        <form method="POST" action="{{route('admin.categories.destroy', ['category'=>$category->id])}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="ml-1 btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                        </form>
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