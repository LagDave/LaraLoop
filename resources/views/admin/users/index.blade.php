@extends('admin.index')
@section('menu')
    <a href="{{route('admin.users.index')}}" class="nav-link active">Users</a>
    <a href="{{route('admin.posts.index')}}" class="nav-link">Posts</a>
    <a href="{{route('admin.categories.index')}}" class="nav-link">Categories</a>
    <a href="" class="nav-link">Tags</a>
    <a href="{{route('admin.posts.trashed')}}" class="nav-link">Trashed Posts</a>
@endsection

@section('content')
    <h4>Users Control Panel</h4>
    <hr>
    <div class="accordion" id="accordionExample">
    @foreach($users as $user)
        <div class="card">
            <div class="card-header hovered" data-toggle="collapse" data-target="#user_{{$user->id}}" >
                <p class="text-primary">
                    <i class="fas

                        @if($user->role->name ==='administrator')
                            fa-star
                        @elseif($user->role->name ==='author')
                            fa-pen-alt
                        @elseif($user->role->name ==='subscriber')
                            fa-eye
                        @endif

                    "></i> {{$user->name}} <small class="text-muted">( {{$user->email}} )</small>
                </p>
            </div>

            <div id="user_{{$user->id}}" class="collapse" data-parent="#accordionExample">
                <div class="card-body">
                    <p>Join Date: <b>{{$user->created_at}}</b></p>
                    <p>Role: <b>{{$user->role->name}}</b></p>
                    <p>Status: <b>{{$user->is_active === 1 ? 'active' : 'inactive'}}</b></p>

                    <hr>

                    @if($user->role->name == 'author')
                        <div class="btn-group">
                            <a href="{{route('admin.users.promote', ['user'=>$user->id])}}" class="btn btn-sm btn-success">Promote to Admin</a>
                            <a href="{{route('admin.users.demote', ['user'=>$user->id])}}" class="btn btn-sm btn-warning">Demote to Subscriber</a>
                        </div>
                        <form action="{{route('admin.users.destroy', ['user'=>$user->id])}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn mt-1 btn-sm btn-danger">Delete User</button>
                        </form>
                    @elseif($user->role->name == 'subscriber')
                        <a href="{{route('admin.users.promote', ['user'=>$user->id])}}" class="btn btn-sm btn-success">Promote to Author</a>
                        <button disabled href="{{route('admin.users.demote', ['user'=>$user->id])}}" class="btn btn-sm btn-warning">Demote to Subscriber</button>
                        <form action="{{route('admin.users.destroy', ['user'=>$user->id])}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="mt-1 btn btn-sm btn-danger">Delete User</button>
                        </form>
                    @elseif($user->role->name == 'administrator')
                        <button disabled href="{{route('admin.users.promote', ['user'=>$user->id])}}" class="btn btn-sm btn-success">Promote to Administrator</button>
                        <button disabled href="{{route('admin.users.demote', ['user'=>$user->id])}}" class="btn btn-sm btn-warning">Demote to Author</button>
                        <form action="{{route('admin.users.destroy', ['user'=>$user->id])}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="mt-1 btn btn-sm btn-danger">Delete User</button>
                        </form>
                    @endif

                </div>
            </div>
        </div>
    @endforeach
    </div>








    {{--<div class="table-responsive">--}}
        {{--<table class="table table-striped w-100 table-borderless table-hoverable">--}}
            {{--<thead>--}}
                {{--<th class="pl-2">Id</th>--}}
                {{--<th>Name</th>--}}
                {{--<th>Email</th>--}}
                {{--<th>Role</th>--}}
                {{--<th>Status</th>--}}
                {{--<th class="pr-2">Actions</th>--}}
            {{--</thead>--}}
            {{--<tbody>--}}
                {{--@foreach($users as $user)--}}
                    {{--<tr>--}}
                        {{--<td class="pl-2 pb-0">{{$user->id}}</td>--}}
                        {{--<td class="pb-0">{{$user->name}}</td>--}}
                        {{--<td class="pb-0">{{$user->email}}</td>--}}
                        {{--<td class="pb-0">{{$user->role->name}}</td>--}}
                        {{--<td class="pb-0">--}}
                            {{--@if($user->is_active === 0)--}}
                                {{--<b><span class="text-danger">Inactive</span></b>--}}
                            {{--@else--}}
                                {{--<b><span class="text-success">Active</span></b>--}}
                            {{--@endif--}}
                        {{--</td>--}}
                        {{--<td class="pr-2 pb-0">--}}
                            {{--@if($user->role->name === 'administrator')--}}
                                {{--<p>--}}
                                    {{--<button disabled class="w-100 mt-0 btn btn-sm btn-primary" type="button" data-toggle="collapse" data-target="#user_{{$user->id}}" aria-expanded="false" aria-controls="collapseExample">--}}
                                        {{--ACTIONS--}}
                                    {{--</button>--}}
                                {{--</p>--}}
                            {{--@else--}}
                                {{--<p>--}}
                                    {{--<button class="w-100 mt-0 btn btn-sm btn-primary" type="button" data-toggle="collapse" data-target="#user_{{$user->id}}" aria-expanded="false" aria-controls="collapseExample">--}}
                                        {{--ACTIONS--}}
                                    {{--</button>--}}
                                {{--</p>--}}
                                {{--<div class="collapse" id="user_{{$user->id}}">--}}
                                    {{--<div style="background: none; border:none" class="card card-body px-0 pt-0">--}}

                                        {{--@if($user->role->name == 'author')--}}
                                            {{--<a href="{{route('admin.users.promote', ['user'=>$user->id])}}" class="btn btn-sm btn-success">Promote to Admin</a>--}}
                                            {{--<a href="{{route('admin.users.demote', ['user'=>$user->id])}}" class="btn mt-1 btn-sm btn-danger">Demote to Subscriber</a>--}}
                                            {{--<form action="{{route('admin.users.destroy', ['user'=>$user->id])}}" method="POST">--}}
                                                {{--@method('DELETE')--}}
                                                {{--@csrf--}}
                                                {{--<button class="btn mt-1 btn-sm form-control btn-danger">Delete User</button>--}}
                                            {{--</form>--}}
                                        {{--@elseif($user->role->name == 'subscriber')--}}
                                            {{--<a href="{{route('admin.users.promote', ['user'=>$user->id])}}" class="btn btn-sm btn-success">Promote to Author</a>--}}
                                            {{--<form action="{{route('admin.users.destroy', ['user'=>$user->id])}}" method="POST">--}}
                                                {{--@method('DELETE')--}}
                                                {{--@csrf--}}
                                                {{--<button class="mt-1 btn btn-sm form-control btn-danger">Delete User</button>--}}
                                            {{--</form>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--@endif--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                {{--@endforeach--}}
            {{--</tbody>--}}
        {{--</table>--}}
    {{--</div>--}}
    <hr>
    {{$users->links()}}
@endsection