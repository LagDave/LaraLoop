@extends('admin.index')
@section('content')


    <div class="card card-body shadow b-radius-10 b-none">
        <h4><span class="text-primary"><i class="fas fa-users"></i></span><b> Quick Add Post</b></h4>
        <br>

        <form action="" class="form">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label>Body</label>
                <textarea name="body" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="category" class="custom-select">
                    <option selected>Select one category</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Tags</label>
                <input onkeyup="check()" id="tags" name='tags' type="text" class="form-control">
            </div>

            <div class="tags-container">

            </div>

        </form>

    </div>

    <script>

        function check(){

        }
    </script>

@endsection