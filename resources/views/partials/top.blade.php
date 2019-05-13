<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LaraCMS</title>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{asset('js/base.js')}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- Base stylings for library use are in here --}}
    <link rel="stylesheet" href="{{asset('css/base.css')}}">

    {{-- Admin CPanel specific stylings are in here --}}
    <link rel="stylesheet" href="{{asset('css/admin-cpanel.css')}}">

    {{-- Tagsinput --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.js"></script>
</head>
<body>
<div id="app">


{{-- This 'if' codeblock will determine what navigation bar will be displayed --}}
@if(Auth::check())
    @if(Auth::user()->role->name === 'administrator')
        @include('navs.administrator_nav')
    @elseif(Auth::user()->role->name === 'author')
        @include('navs.author_nav')
    @else
        @include('navs.guest_nav')
    @endif
@else
    @include('navs.guest_nav')
@endif

{{-- This 'if' code block will show flash session messages both for succeeded or failed --}}
@if(request()->session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{request()->session()->get('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@elseif(request()->session()->has('failed'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed!</strong> {{request()->session()->get('failed')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<br>
<div class="container">