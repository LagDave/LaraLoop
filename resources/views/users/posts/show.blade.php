@extends('layouts.app')
@section('content')
    {{-- Post Image --}}
    <img src="{{$post->image}}" class="img-fluid" alt="">
    <br><br>


    <div class="row">
        <div class="col-lg-9">
            <div class="card card-body b-none shadow">
                <h2 class="text-crimson text-grey mt-3 text-center">{{$post->title}}</h2>
                <p class="text-center mt-3">
                    <small class=" text-grey text-montserrat">
                        <i class="fas fa-clock"></i> {{$post->created_at}} |
                        <a href=""><i class="fas fa-stream"></i> {{$post->category->name}}</a> |
                        <a href=""><i class="fas fa-user"></i> {{$post->user->name}}</a>
                    </small>
                </p>
                <br>
                <hr>
                <pre style="font-size:1.3em" class="pre-wrap text-crimson">{!!$post->body!!}</pre>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card b-none shadow">
                <div class="card-header">
                    <span class="text-primary"><i class="fas fa-tags"></i> Post Tags</span>
                </div>
                <div class="card-body">
                    @foreach($tags as $tag)
                        <span style="display: inline-block; margin-right: 5px;">
                            <a  class='text-primary card tag-card b-none pad-small c-pointer shadowed b-radius-1000 card-body' href="">
                                <small style="font-size:.7em" class="ml-1 text-center mb-0 text-primary tag-name">
                                    <b>{{$tag->name}}</b>
                                </small>
                            </a>
                        </span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection


<script>
    let tag_names = document.querySelectorAll('.tag-name b');
    tag_names.forEach((e)=>{
        e.innerText = e.innerText.substr(0, 3)+' ...';
    })
</script>