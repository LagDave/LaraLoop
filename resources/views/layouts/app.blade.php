{{-- This layout is used by home blade --}}
@include('partials.top')
<main class="py-4">
    <div class="container-fluid">
        @yield('content')
    </div>
</main>
@include('partials.bottom')