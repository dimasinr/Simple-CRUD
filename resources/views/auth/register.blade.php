@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 md:fw-200">
            <div class="card2a">
                {{-- <div class="card-header">{{ __('Register') }}</div> --}}

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="middle" style="font-weight: 500">Register</div><hr>
                        <div class="form-group min-mb-10">
                            <label for="name" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                                <input id="name" type="text" placeholder="Name" style="border-radius: 15px" class="form-control md:w-215 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="off" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group min-mb-10">
                            <label for="username" class="col-md-4 col-form-label text-md-right"></label>
                            
                            <div class="col-md-6">
                                <input type="text" name="username" id="username" placeholder="Username" style="border-radius: 15px" class="form-control md:w-215" @error('username') is-invalid @enderror value="{{ old('username') }}" required autocomplete="off">
                            
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group min-mb-10">
                            <label for="email" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                                <input id="email" type="email" style="border-radius: 15px" placeholder="Email Address" class="form-control md:w-215 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group min-mb-10">
                            <label for="password" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                                <input id="password" type="password" style="border-radius: 15px" placeholder="Password" class="form-control md:w-215 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group min-mb-10">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" style="border-radius: 15px" placeholder="{{ __('Confirm Password') }}" class="form-control md:w-215" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mt-4 middle md:w-200">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn btn-bov" style="width: 70%">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
