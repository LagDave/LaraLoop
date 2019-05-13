@extends('admin.index')
@section('content')
    <div class="card card-body shadow b-radius-10 b-none">
        <h4><span class="text-primary"><i class="fas fa-users"></i></span><b> Quick Add User</b></h4>
        <br>
        <form action="{{route('admin.users.store')}}" method="POST" class="form">
           @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control">
            </div>

            <div class="form-group">
                <label>Role <small class="text-muted">Select one</small></label>
                <br>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline1" name="role_id" value="1" class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline1"><i class="text-primary fas fa-star"></i> Administrator</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline2" name="role_id" value="2" class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline2"><i class="text-primary fas fa-pen-alt"></i> Author</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input checked type="radio" id="customRadioInline3" name="role_id" value="3" class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline3"><i class="text-primary fas fa-eye"></i> Subscriber</label>
                </div>
            </div>
            <br>

            <button class="btn btn-primary form-control">Create User</button>
        </form>
    </div>
@endsection