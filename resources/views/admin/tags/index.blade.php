@extends('admin.index')
@section('content')
    <div class="card card-body shadow b-radius-10 b-none h-100">
        <h4><b>Tags Control Panel</b></h4>
        <br>
        <div class="row">
            @foreach($tags as $tag)
                <div class="col-md-3">
                    <div class="card pad-small c-pointer shadowed b-radius-1000 card-body">
                        <p class="text-center mb-0 text-primary">#<b>{{$tag->name}}</b></p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection