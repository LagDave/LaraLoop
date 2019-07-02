<div class="card-header "><span class="text-primary"><i class="fas fa-user"></i><b> {{Auth::user()->name}} <small class="text-muted">({{Auth::user()->role->name}})</small></b></span></div>
<div class="card-body">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <p><small><span class="text-muted">Email: </span>{{Auth::user()->email}}</small></p>

    </div>
    <a href="" class="btn btn-primary w-100"><i class="fas fa-cogs"></i> Account Settings</a>
</div>