<div class="card b-none shadow">
    <div class="card-header">
        <h5 class='text-primary'>Post Feed</h5>
    </div>
    <div class="card-body b-none shadow">
        <div class="row ">
            @foreach($posts as $post)
                <div class="col-lg-4">
                    <div class="card b-none">
                        <div class=" card-body">
                            <p class='mb-0'>{{$post->title}}</p>
                             <small class="text-muted"><i class="fas fa-clock"></i> {{$post->created_at}}</small>
                            <img src="{{$post->image}}" alt="" class="img-fluid mb-1 mt-1">
                            <a href="{{route('posts.show', ['post'=>$post->id])}}" class="btn w-100 btn-sm btn-success">Read</a>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
</div>


<script>
    let post_bodies = document.querySelectorAll('.body');
    post_bodies.forEach((e)=>{
        e.innerText = e.innerText.substr(0, 10)+' ...';
    })
</script>