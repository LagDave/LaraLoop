<div class="card-header">
    <span class="text-primary"><i class="fas fa-stream"></i> Categories</span>
</div>

<div class="card-body">
    @foreach($categories as $category)
    <a href="{{route('posts.categoryPosts', ['category' => $category->id, 'categoryname'=>$category->name])}}">{{$category->name}}</a> |
    @endforeach
</div>

