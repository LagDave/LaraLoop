@extends('layouts.app')
{{-- Page Specific Stylesheet --}}
<link rel="stylesheet" href="{{asset('css/forum_styles.css')}}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


@section('content')

    <div class="row">
        <div class="col-lg-3">

            {{-- User Recent Posts --}}
            <div class="card b-none shadow">
                @include('components.vertical-nav')
            </div>
            <br>
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

        <div class="px-0 py-0 col-lg-9">

            {{-- All Posts  --}}
            @include($main_content)
        </div>
    </div>

@endsection
