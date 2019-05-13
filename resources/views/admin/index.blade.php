@include('partials.top')

<div class="row">

    <div class="col-lg-3 mb-5">
        <div class="card b-none shadow">
            <div class="card-header"><span class="text-primary"><i class="fas fa-cogs"></i></span><b> Control Panel</b></div>
            <div class="card-body">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a href="{{route('admin.users.index')}}" class="nav-link"><span class="text-primary"><i class="fas fa-users"></i></span> Users</a>
                    <a href="{{route('admin.posts.index')}}" class="nav-link"><span class="text-primary"><i class="far fa-file"></i></span> Posts</a>
                    <a href="{{route('admin.categories.index')}}" class="nav-link"><span class="text-primary"><i class="fas fa-stream"></i></span> Categories</a>
                    <a href="{{route('admin.tags.index')}}" class="nav-link"><span class="text-primary"><i class="fas fa-tags"></i></span> Tags</a>
                    <a href="{{route('admin.posts.trashed')}}" class="nav-link"><span class="text-primary"><i class="fas fa-trash-alt"></i></span> Trashed Posts</a>
                </div>
            </div>
        </div>
        <br>
        <div class="card b-none shadow">
            <div class="card-header"><span class="text-primary"><i class="fas fa-plus-square"></i></span><b> Quick Add</b></div>
            <div class="card-body">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a href="{{route('admin.users.create')}}" class="nav-link"><span class="text-primary"><i class="fas fa-users"></i></span> Create User</a>
                    <a href="{{route('admin.posts.create')}}" class="nav-link"><span class="text-primary"><i class="far fa-file"></i></span> Create Post</a>
                    <a href="{{route('admin.categories.index')}}" class="nav-link"><span class="text-primary"><i class="fas fa-stream"></i></span> Create Category</a>
                    <a href="{{route('admin.tags.index')}}" class="nav-link"><span class="text-primary"><i class="fas fa-tags"></i></span> Create Tag</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        @yield('content')
    </div>
</div>

@yield('scripts')
@include('partials.bottom')