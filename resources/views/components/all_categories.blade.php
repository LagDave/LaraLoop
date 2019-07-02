<div class="card-header">
    <span class="text-primary"><i class="fas fa-stream"></i> Categories</span>
</div>

<div class="card-body">
    @foreach($categories as $category)
        <a href="">{{$category->name}}</a> |
    @endforeach
</div>

