@extends('layouts.backend',['title' => $title])
@section('content')
    <div class="card">
        <div class="card-header">New Genre</div>
        <div class="card-body">
            <form action="{{ route('genres.create') }}" method="post">
             @csrf

             <div class="mb-4">
                 <label for="name" class="form-label">Name</label>
                 <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" @error('name') is-invalid @enderror>
                 @error('name')
                     <span class="text-danger">{{ $message }}</span>
                 @enderror
             </div>
             <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
