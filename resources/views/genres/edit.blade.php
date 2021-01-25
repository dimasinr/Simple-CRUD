@extends('layouts.backend')
@section('content')
    <div class="card">
        <div class="card-header">{{ $title }}</div>
        <div class="card-body">
            <form action="{{ route('genres.edit', $genre) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-4">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') ?? $genre->name }}" class="form-control" @error('name') @enderror>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <button type="submit" class="btn btn-primary mt-4">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection