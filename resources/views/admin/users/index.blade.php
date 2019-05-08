@extends('admin.index')
@section('menu')
    <a href="{{route('admin.users.index')}}" class="nav-link active">Users</a>
    <a href="{{route('admin.posts.index')}}" class="nav-link">Posts</a>
    <a href="" class="nav-link">Categories</a>
    <a href="" class="nav-link">Tags</a>
    <a href="" class="nav-link">Trashed Posts</a>
@endsection

@section('content')
    <h3>Users Control Panel</h3>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped w-100 table-borderless table-hoverable">
            <thead>
                <th class="pl-2">Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th class="pr-2">Actions</th>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="pl-2">{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->name}}</td>
                        <td>
                            @if($user->is_active === 0)
                                <b><span class="text-danger">Inactive</span></b>
                            @else
                                <b><span class="text-success">Active</span></b>
                            @endif
                        </td>
                        <td class="pr-2">
                            @if($user->role->name === 'administrator')
                                <p>
                                    <button disabled class="w-100 mt-3 btn btn-sm btn-primary" type="button" data-toggle="collapse" data-target="#user_{{$user->id}}" aria-expanded="false" aria-controls="collapseExample">
                                        ACTIONS
                                    </button>
                                </p>
                            @else
                                <p>
                                    <button class="w-100 mt-3 btn btn-sm btn-primary" type="button" data-toggle="collapse" data-target="#user_{{$user->id}}" aria-expanded="false" aria-controls="collapseExample">
                                        ACTIONS
                                    </button>
                                </p>
                                <div class="collapse" id="user_{{$user->id}}">
                                    <div style="background: none; border:none" class="card card-body px-0 pt-0">

                                        @if($user->role->name == 'author')
                                            <a href="{{route('admin.users.promote', ['user'=>$user->id])}}" class="btn btn-sm btn-success">Promote to Admin</a>
                                            <a href="{{route('admin.users.demote', ['user'=>$user->id])}}" class="btn mt-1 btn-sm btn-danger">Demote to Subscriber</a>
                                            <form action="{{route('admin.users.destroy', ['user'=>$user->id])}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-sm form-control btn-danger">Delete User</button>
                                            </form>
                                        @elseif($user->role->name == 'subscriber')
                                            <a href="{{route('admin.users.promote', ['user'=>$user->id])}}" class="btn btn-sm btn-success">Promote to Author</a>
                                            <form action="{{route('admin.users.destroy', ['user'=>$user->id])}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="mt-1 btn btn-sm form-control btn-danger">Delete User</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <hr>
    {{$users->links()}}
@endsection