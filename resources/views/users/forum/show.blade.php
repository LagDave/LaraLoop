
<div style='z-index:999' class="b-none shadow card card-body">
    <div class="row">
        <div class="vote-container col-1">
            <small class="text-center text-muted">324</small>
            <i class="up vote fas fa-arrow-circle-up"></i>
            <i class="down vote fas fa-arrow-circle-down"></i>
            <small class="text-center text-muted">343</small>
        </div>
        <div class="col-11">
            <pre style='font-size:1.1em' class='pre-wrap text-crimson'>{!!$forum_post->forum_post_body!!}</pre>
            <small  class="text-muted">
                @foreach ($forum_post->tags as $tag)
                    <span  data-toggle="tooltip" data-placement="top" title="{{$tag->name}}" style="display: inline-block; margin-right: 5px; padding-bottom:10px">
                        <a  class='text-primary card tag-card b-none pad-small c-pointer shadowed b-radius-1000 card-body' href="{{route('posts.tagPosts', ['tag'=>$tag->id, 'tagname' =>$tag->name])}}">
                            <small style="font-size:.7em" class="ml-1 text-center mb-0 text-primary tag-name">
                                <b>{{$tag->name}}</b>
                            </small>
                        </a>
                    </span>
                @endforeach
            </small>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-6">
            <small class="text-primary">{{$forum_post->category->name}}</small><br>
            <small class="text-muted text-primary"><b>{{$forum_post->forum_post_user_name}}</b> {{Carbon\Carbon::parse($forum_post->created_at)->diffForHumans()}}</small>
        </div>
        <div class="col-lg-6">
            <p class='mb-0' style='text-align:right'>

                <i class="fas fa-eye"></i> 0 views | 
                @if(Auth::check())
                    <button data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" class="btn btn-primary btn-sm"><i class="fas fa-comment"></i> {{sizeof($forum_post->comments)}} {{sizeof($forum_post->comments) > 1 ? 'Comments':'Comment'}}</button> |
                @else
                    <i class="fas fa-comment"></i> {{sizeof($forum_post->comments)}} {{sizeof($forum_post->comments) > 1 ? 'Comments':'Comment'}} |
                @endif

                @if($forum_post->solved === 1)
                    <span style='color:green'> <i class="fas fa-check-circle"></i> Solved</span></p>
                @else
                    <span> Unsolved</span>
                @endif
            </p>
        </div>
        
    </div>


    <div class="collapse" id="collapseExample">
        <br>
        <div>
            <form action="{{route('forum.comment', ['forum_post'=>$forum_post->id])}}" method='POST' class='form'>
                @csrf
                <textarea name="body" rows="5" class="form-control mb-2"></textarea>
                <button class="btn btn-primary"><i class="fas fa-comment"></i> Comment</button>
            </form>
        </div>
    </div>
</div>

<br><br>

@foreach($forum_post->comments()->orderBy('id', 'desc')->get() as $comment)
    @if($comment->solution == 0)
        <div class="card card-body b-none shadow-sm">
            <p class='mb-0'>{{$comment->body}}</p>
            <small><b class='text-primary'>{{$comment->commenter_name}}</b> | <span class="text-muted">{{Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</span></small>
        </div>
        <br>
    @endif
@endforeach
<p class="text-center">
<small class='text-muted'><i><a href="/login">Sign in</a> to create and participate in Posts</i></small>
</p>