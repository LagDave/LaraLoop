@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-2">

            {{-- User Recent Posts --}}
            <div class="card b-none shadow">
                @include('components.vertical-nav')
            </div>

        </div>

        <div class="col-lg-7">

            {{-- All Posts  --}}
            @include('components.all_posts')
        </div>

        <div class="col-lg-3">
            {{-- All Categories --}}
            <div class="card b-none shadow">
                @include('components.all_categories')
            </div>

            <br>
            {{-- All Tags --}}
            <div class="card b-none shadow">
               @include('components.all_tags')
            </div>
        </div>
    </div>

@endsection
