@extends('layouts.backend',['title' => $title])
@section('content')
    <div class="card">
        <div class="card-header">{{ $title }}</div>
        <div class="card-body">
            <form action="{{ route('albums.create', $album) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="band">Band</label>
                    <select name="band" id="band" class="form-control">
                        <option disabled selected>Choose a Band</option>
                        @foreach ($band as $band)
                            <option {{ $band->id == $album->band_id ? "selected" : '' }} value="{{ $band->id }}">{{ $band->name }}</option>
                        @endforeach
                    </select>
                        @error('band')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                        </div>
                
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{ old('name') ?? $album->name }}" id="name" class="form-control">
                    @error('name')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                    </div>
                
                    <div class="form-group">
                        <label for="year">Year</label>
                        <select name="year" id="year" class="form-control">
                            <option disabled selected>Choose a Year</option>
                                @for ($i = 1990; $i <= date("Y"); $i++)
                                    <option {{ $album->year == $i ? "selected" : '' }} value={{ $i }}>{{ $i }}</option>
                                @endfor
                        </select>    
                        @error('year')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <button type="submit" class="btn btn-primary">{{ $submitLabel ?? '' }}</button>
                {{-- @include('albums.partials.form-control') --}}
            </form>
        </div>
    </div>
@endsection