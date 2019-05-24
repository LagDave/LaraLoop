@extends('admin.index')
@section('content')
    <div class="card card-body shadow b-radius-10 b-none">
        <h3><span class="text-primary"><i class="fas fa-pen-alt"></i></span> <b>Edit Post</b></h3>
        <br>
        <form method="POST" action="{{route('admin.posts.update', ['post'=>$post->id])}}" class="form">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label><b>Title</b></label>
                <input type="text" name="title" value="{{old('title') ?? $post->title}}" class="form-control">
                @if($errors->has('title'))
                    <small class="text-danger"><b><i class="fas fa-exclamation"></i> {{$errors->first('title')}}</b></small>
                @endif
            </div>
            <div class="form-group">
                <label><b>Image</b></label>
                <input value="{{old('image') ?? $post->image}}" required type="text" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label><b>Body</b></label>
                <textarea name="body" rows="10" class="form-control">{{old('body') ?? $post->body}}</textarea>
                @if($errors->has('body'))
                    <small class="text-danger"><b><i class="fas fa-exclamation"></i> {{$errors->first('body')}}</b></small>
                @endif
            </div>


            <div class="form-group">
                <label>Category</label>
                <select name="category_id" class="custom-select">
                    <option>Select one category</option>
                    @foreach($categories as $category)
                        @if($category->id == $post->category->id)
                            <option selected value="{{$category->id}}">{{$category->name}}</option>
                        @endif
                        <option value="{{$category->id}}">{{$category->name}}</option>

                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-lg-6">

                    <input placeholder="Search for tags..." onkeyup="check()" id="tags" type="text" class="form-control">
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

            <button class="btn btn-primary form-control">UPDATE</button>
        </form>
    </div>

    <script src="{{asset('js/post_tagging.js')}}"></script>
    <script>
    {{-- Get the Tags of the post --}}
        $.get("{{route('admin.tags.return.postTags', ['post'=>$post->id])}}", function(data, status){

            let included_ids = [];
            let included_names = [];

            for(index in data){
                addToIncluded(data[index].id, data[index].name)
            }


        })
    </script>


@endsection
