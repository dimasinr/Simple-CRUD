@extends('layouts.backend')
@section('content')
    <div class="card">
        <div class="card-header">Edit Album : {{ $album
        ->name }}</div>
        <div class="card-body">
            <form action="{{ route('albums.edit', $album) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            @include('albums.partials.form-control')
            </form>
        </div>
    </div>
@endsection