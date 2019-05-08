@extends('admin.index')

@section('content')
    <h3>Users Control Panel</h3>
    <hr>
    <table class="table-striped w-100 table-borderless table-hoverable">
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
                                        <button class="btn btn-sm btn-success">Promote to Admin</button>
                                        <button class="btn mt-1 btn-sm btn-danger">Demote to Subscriber</button>
                                        <button class="btn mt-1 btn-sm btn-danger">Delete User</button>
                                    @elseif($user->role->name == 'subscriber')
                                        <button class="btn btn-sm btn-success">Promote to Author</button>
                                        <button class="btn mt-1 btn-sm btn-danger">Delete User</button>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    {{$users->links()}}
@endsection