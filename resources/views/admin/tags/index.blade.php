@extends('admin.index')
@section('content')
    <div class="card card-body shadow b-radius-10 b-none h-100">
        <h4><span class="text-primary"><i class="fas fa-tags"></i></span><b> Tags Control Panel</b></h4>
        <br>
        <div class="row">
            @foreach($tags as $tag)
                <div class="col-md-3">
                    <div data-toggle="tooltip" data-placement="top" title="#{{$tag->name}}" class="card tag-card b-none pad-small c-pointer shadowed b-radius-1000 card-body">
                        <small class="text-center mb-0 text-primary tag-name"><i class="fas fa-tag"></i><b> {{$tag->name}}</b></small>
                        <div class="button-group">
                            <a href="{{route('admin.tags.edit', ['tag'=>$tag->id])}}" class="text-success"><i class="fas fa-pen-alt"></i></a>
                            <form class="tag-delete-form" action="{{route('admin.tags.destroy', ['tag'=>$tag->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="text-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </div>
                    </div>
                    <br>
                </div>
            @endforeach
        </div>
    </div>
@endsection


{{-- Were still not using vue or
 compiled assets at the moment--}}
@section('scripts')
    <script src="{{asset('js/admin_cpanel/tagname_stripper.js')}}"></script>
@endsection