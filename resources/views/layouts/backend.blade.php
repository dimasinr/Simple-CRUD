@extends('layouts.base')
@section('baseStyles')
    {{-- Style --}}
    <link href="{{ asset('css/backend.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fonticon/css/all.min.css') }}">
@endsection
@section('baseScripts')
    <script src="{{ asset('js/backend.js') }}"></script>
    @stack('scripts')
@endsection
@section('body')
    <div class="container-fluid py-3">
        <div class="row">
            <div class="col-md-3">
                <x-sidebar></x-sidebar>
            </div>
            <div class="col-md-9">
                @include('alert')
                @yield('content')
            </div>
        </div>  
    </div>
@endsection