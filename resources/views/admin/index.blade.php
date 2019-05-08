@include('partials.top')

<div class="row">

    <div class="col-lg-3 mb-5">
        <div class="card">
            <div class="card-header">Control Panel</div>
            <div class="card-body">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    @yield('menu')
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        @yield('content')
    </div>
</div>

@include('partials.bottom')