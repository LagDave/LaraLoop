@extends('admin.index')
@section('content')
    <div class="card card-body shadow b-radius-10 b-none h-100">
        <h4><span class="text-primary"><i class="fas fa-tags"></i></span><b> Tags Control Panel</b></h4>
        <br>
        <div class="row">
            @foreach($tags as $tag)
                <div class="col-md-3">
                    <div data-toggle="tooltip" data-placement="top" title="#{{$tag->name}}" class="card tag-card b-none pad-small c-pointer shadowed b-radius-1000 card-body">
                        <p class="text-center mb-0 text-primary tag-name">#<b>{{$tag->name}}</b></p>
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

    {{-- SCRIPTS --}}
    <script>

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

        let tag_names = document.querySelectorAll('.tag-name');
        tag_names.forEach((tag_name)=>{
            tag_name.innerText = tag_name.innerText.slice(0, 8)+' ...';
        })
    </script>
@endsection