@extends('admin.index')

@section('content')
    <div class="card card-body shadow b-radius-10 b-none">
        <h4><span class="text-primary"><i class="fas fa-stream"></i></span><b> Create a Category</b></h4>
        <br>
        <form action="{{route('admin.categories.store')}}" method="POST" class="form">
            @csrf
            <div class="form-group">
                <label>Name</label>
            <input type="text" value="{{old('name')}}" name='name' class="form-control">
                @if($errors->has('name'))
                    <small class="text-danger"><b><i class="fas fa-exclamation"></i> {{$errors->first('name')}}</b></small>
                @endif
            </div>

        <button class="btn btn-primary form-control">Create</button>
        </form>
    </div>
@endsection