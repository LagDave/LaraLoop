@include('partials.top')

<div class="row">

    <div class="col-lg-3 mb-5">
        <div class="card">
            <div class="card-header">Control Panel</div>
            <div class="card-body">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a href="" class="nav-link active">Users</a>
                    <a href="" class="nav-link">Posts</a>
                    <a href="" class="nav-link">Categories</a>
                    <a href="" class="nav-link">Tags</a>
                    <a href="" class="nav-link">Trashed Posts</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        @yield('content')
    </div>
</div>

@include('partials.bottom')