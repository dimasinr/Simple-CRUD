@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Homepage</div>
                    <div class="card-body">
                        @auth
                            Hello {{ Auth::user()->username }}
                        @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
