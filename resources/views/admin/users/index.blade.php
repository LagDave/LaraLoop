@extends('admin.index')
@section('content')
    <div class="card card-body shadow b-radius-10 b-none">
    <h4><span class="text-primary"><i class="fas fa-users"></i></span><b> Users Control Panel</b></h4>
        <br>
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
    </div>
    <br>
    <div class="card b-none card-body shadow">
        {{$users->links()}}
    </div>
@endsection