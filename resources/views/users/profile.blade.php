@extends('layouts.frontend')
@section('content')
<div id="bGre">
    <div class="py-3">
        <div class="ml-3 mr-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card2a shadow-sm">
                        <div class="card-body">
                            <div> 
                                <img class="rounded-circle md:ava ava center mt-2" 
                                src="../storage/images/avatars/{{ Auth::user()->avatar }}">                     
                                <div class="mt-2 ta-2"><b>{{ Auth::user()->username }}</b></div>
                                <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                                    <input type="file" name="avatar">
                                    <button type="submit" class="btn btn-wi" style="width: 10%">Upload</button>
                                </form>
                            </div>

                            <div class="d-flex justify-content-center">
                                <div class="col-lg-7 mt-2 md:items-c">
                                    <div class="car ta-2">
                                        <div class="card-body"><hr>
                                            {{-- <p>{!! nl2br($author->bio) !!}</p> --}}
                                            The greatest glory in living lies not in never falling, 
                                            but in rising every time we fall.
                                        </div>
                                    </div>    
                                </div>
                            </div>

                            @can('update', User::class)

                            <div class="d-flex justify-content-center">
                                <div class="ta-2 md:ta-2 col-lg-4 mt-3">
                                    <div class="btn btn-wi" data-toggle="modal" data-target="#examplemodal" style="width: 35%">
                                        Edit Profile
                                    </div>
                                    <div class="btn btn-wi" style="width: 30%">
                                        Email
                                    </div>   
                                </div>
                            </div>

                            @endcan
                            
                        </div>
                    </div>
                    <div class="card2a mt-2 shadow-sm">
                        <div class="container">
                            <div class="mt-4">
                                <h5><b>My Story :</b></h5><hr>
                                <div class="col-md-5">
                                    abc
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const bGre = document.querySelector('#bGre');
    bGre.style.backgroundColor = 'rgb(243, 243, 243)';
</script>
@endsection