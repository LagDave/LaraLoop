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
                        <a href="{{route('posts.categoryPosts', ['category' => $post->category->id, 'categoryname'=>$post->category->name])}}"><i class="fas fa-stream"></i> {{$post->category->name}}</a> |
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
                            <a href="{{route('posts.tagPosts', ['tag'=>$tag->id, 'tagname' =>$tag->name])}}" class='text-primary card tag-card b-none pad-small c-pointer shadowed b-radius-1000 card-body' href="">
                                <small style="font-size:.7em" class="ml-1 text-center mb-0 text-primary tag-name">
                                    <b>{{$tag->name}}</b>
                                </small>
                            </a>
                        </span>
                    @endforeach
                </div>
            </div>

            <br><br>

            <div class="card b-none shadow">
                <div class="card-header">
                    <span class="text-primary"><i class="fas fa-comments"></i> Comments</span>
                </div>
                <div class="card-body">
                    @foreach($post->comments as $comment)
                        <div style="border-bottom: 1px solid #eee; border-radius: 0;" class="b-none card card-body pl-0 pr-0">
                            <small class="text-muted"><b>{{$comment->commenter_name}}</b> <span style="font-size:.7em">( {{$comment->created_at}} )</span></small>
                            <p class="mb-0">{{$comment->comment_body}}</p>
                            @if($comment->commenter_id == Auth::id())
                            <br>
                            <form method="POST" action="{{route('comments.destroy', ['post'=>$post->id, 'comment' => $comment->id])}}">
                                @csrf
                                @method('DELETE')
                                <div class="btn-group">
                                    <button type='button' data-toggle="modal" data-target="#comment_{{$comment->id}}" style='color:white' class="btn btn-sm btn-success"><i class="fas fa-pen"></i></button>
                                    <button type='submit' class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </div>
                            </form>                            
                            <!-- Modal -->
                            <div class="modal fade" id="comment_{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" class='comment_update_form' action="{{route('comments.update', ['post' => $post->id, 'comment'=> $comment->id])}}">
                                                @csrf
                                                @method('PATCH')
                                                <input name='new_comment_body' type="text" value='{{$comment->comment_body}}' class="form-control">
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button onclick='submitCommentUpdate()' type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    @endforeach
                    <br>

                    @if(Auth::check())
                        <form action="{{route('comments.store', ['post_id'=> $post->id])}}" method='POST' class="form comment_form">
                            @csrf
                            <div class="row">
                                <div class="col-7 pr-0">
                                    <input type="text" name="comment_body" class="form-control form-control-sm mb-2">
                                </div>
                                <div class="col-5 pl-1">
                                    <button class="btn btn-sm btn-primary">Comment</button>
                                </div>
                            </div>
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    let tag_names = document.querySelectorAll('.tag-name b');
    tag_names.forEach((e)=>{
        e.innerText = e.innerText.substr(0, 3)+' ...';
    })

    function submitCommentUpdate(){
        $(".comment_update_form").submit();
    }
</script>