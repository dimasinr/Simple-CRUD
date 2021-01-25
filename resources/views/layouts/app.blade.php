@extends('layouts.base')
@section('baseStyles')
    {{-- Style --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css2/style.css') }}" rel="stylesheet">
@endsection
@section('baseScripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
@section('body')
    <x-navbar></x-navbar>
    <div class="mt-4">
        @yield('content')
    </div>
@endsection