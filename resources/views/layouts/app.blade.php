{{-- This layout is used by home blade --}}
@include('partials.top')
    <main class="py-4">
        @yield('content')
    </main>
@include('partials.bottom')