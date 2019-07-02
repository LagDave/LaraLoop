@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-2">
            <div class="card b-none shadow">
                @include('components.vertical-nav')
            </div>
        </div>
        <div class="col-lg-10">
            <div class="card card-body shadow b-none">
                <h4><b>Create a new Post</b></h4>
                <hr>
                <form method="POST" action="{{route('posts.store')}}" class="form">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input required type="text" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Body</label>
                        <textarea name="body" rows="5" class="form-control body"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category_id" class="custom-select">
                            <option selected>Select one category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tags</label>
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
                    <br>
                    <button class="btn btn-primary form-control">Create Post</button>
                </form>
            </div>
        </div>
    </div>
    {{-- Page Specific Scripts --}}
    <script src="{{asset('js/post_tagging.js')}}"></script>


@endsection