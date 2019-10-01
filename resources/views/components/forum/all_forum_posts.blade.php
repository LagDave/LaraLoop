<div class="container">
        <div>
            <nav class="mb-3 navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#"><i class="fab fa-laravel"></i> Laraloop Forum</a>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categories
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @foreach($categories as $category)
                                    <a href="" class="dropdown-item">{{$category->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    @if(Auth::check() && Auth::user()->role_id > 0 && Auth::user()->role_id < 4)
        <p>
            <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            <i class="fas fa-pen"></i> Create a Thread
            </button>
        </p>
    @else
    <p class="text-center">
        <small class='text-muted'><i><a href="/login">Sign in</a> to create and participate in Posts</i></small>
    </p>
    @endif

    <div class="collapse" id="collapseExample">

        <div class="card card-body shadow b-none">
            <form action="{{route('forum.store')}}" method='POST' class="form">
                @csrf

                <div class="form-group">
                    <select name="visibility" class="form-control">
                        <option value="public"> Public</option>
                        <option value="friends">Friends only</option>
                        <option value="private">Private</option>
                    </select>
                </div>

                <div class="form-group">
                    <textarea required name="forum_post_body" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select required name="category_id" class="custom-select">
                        <option disabled selected>Select one category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <label>Add Tags</label>
                <div class="row">   
                    <div class="col-lg-6">
                        <input placeholder="Search for tags..." onkeyup="check()" id="tags" type="text" class="tag-input form-control">
                        <br>
                        <div style="min-height:150px;" class="tags-container card card-body b-none shadow">
                            <div class="row">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label><b>Included Tags</b></label>
                            <br>
                            <div style="min-height:180px;" class='card card-body b-none shadow' id="included-tags">
                                <div class="row"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <button class="btn btn-primary mt-2">Post Thread</button>   

            </form>
        </div>
    </div>
    <hr>


    @foreach($forum_posts as $forum_post)
        <a class='forum_post_header' href="{{route('forum.show', ['forum_post' => $forum_post->id])}}">
            <div style='cursor:pointer' class="card mb-3 shadow b-none card-body">
                
                <div class="row">
                    <div class="col-lg-6">
                        
                        <div class="row">
                            <div class="vote-container col-2">
                                <small class="text-center text-muted">324</small>
                                <i class="up vote fas fa-arrow-circle-up"></i>
                                <i class="down vote fas fa-arrow-circle-down"></i>
                                <small class="text-center text-muted">343</small>
                            </div>
                            <div class="col-10">
                                <p class="forum-post-title text-primary">
                                    <b><span data-toggle='tooltip' placement='top' title='{{substr($forum_post->forum_post_body, 0, 120)." [...]"}}'>
                                        {{$forum_post->forum_post_body}}
                                    </span></b>
                                    <br>
                                    <small>{{$forum_post->category->name}}</small>
                                    <br>
                                    <small class="text-muted"><b>{{$forum_post->forum_post_user_name}}</b> <i>{{Carbon\Carbon::parse($forum_post->created_at)->diffForHumans()}}</i></small>
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <p class='mb-0' style='text-align:right'>

                            <i class="fas fa-eye"></i> 0 views | 
                            <i class="fas fa-comment"></i> {{sizeof($forum_post->comments)}} {{sizeof($forum_post->comments) > 1 ? 'Comments':'Comment'}} |
                            @if($forum_post->solved === 1)
                                <span style='color:green'> <i class="fas fa-check-circle"></i> Solved</span></p>
                            @else
                                <span> Unsolved</span>
                            @endif

                            <p class='mt-0' style='text-align:right'>
                                @foreach ($forum_post->tags as $tag)
                                    <small style="font-size:.7em" class="ml-1 text-center mb-0 text-primary tag-name">
                                        <b>{{$tag->name}}</b>
                                    </small>
                                @endforeach
                            </p>
                        </p>
                    </div>
                </div>

            </div>
        </a>
    @endforeach
</div>
<script>
    let titles = document.querySelectorAll('.forum-post-title span');
    titles.forEach((title)=>{
        if(title.innerText.length > 80){
            title.innerText = title.innerText.substring(0, 80) + "   [...]";
        }
    })

</script>
<script src="{{asset('js/post_tagging.js')}}"></script>
