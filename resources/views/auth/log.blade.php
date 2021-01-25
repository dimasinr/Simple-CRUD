@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="md:card mt-5" id="wrapper">

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3 md:fw-200 fw-700 md:middle middle">Sign Your Account<hr></div>
                        <div class="form-group row">
                            <label for="username" class="col-md-3 col-form-label text-md-right"></label>

                            <div class="col-md-6 md:middle middle">
                                <input id="username" type="username" placeholder="Username" class="form-ra md:w-85 @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="off">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label text-md-right"></label>

                            <div class="col-md-6 md:middle middle">
                                <input id="password" type="password" placeholder="Password" class="form-ra md:w-85 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="items-center row mb-0">
                            <div class="col-md-6 md:middle middle">
                                <button type="submit" class="btn btn-bov md:w-85">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>

                        <div class="md:items-center offset-md-4 md:middle middle col-md-4 mt-2">
                            @if (Route::has('password.request')) 
                                    <a class="btn btn-link btn-sm" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                <div class="">
                                    <a href="{{ route('register') }}" class="text-secondary btn-sm" style="text-align: center;">Register</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- <div class="form-group row">
    <div class="col-md-6 offset-md-4">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>
    </div>
</div> --}}
