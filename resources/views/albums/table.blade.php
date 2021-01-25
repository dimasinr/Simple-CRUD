@extends('layouts.backend',['title'=>$title])
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="container">Album</div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Band</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($albums as $album)
                        <tr>
                            <td>{{ $albums->count() * ($albums->currentPage() -1) + $loop->iteration }}</td>
                            <td>{{ $album->name }}</td>
                            <td>{{ $album->band->name }}</td>
                            <td>
                                <a href="{{ route('albums.edit' , $album->slug) }}" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
                                <div endpoint="{{ route('albums.delete', $album) }}" class="delete d-inline"></div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $albums->links() }}
        </div>
    </div>
@endsection