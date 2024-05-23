@extends('layouts.app')

@section('content')

<div class="container">
    @if($message = Session::get('failed'))
        <div class="alert alert-danger">
            <strong>Failed :</strong> {{ $message }}
        </div>
    @endif
    <div class="row mt-4 d-flex justify-content-center align-items-center">
        <div class="col col-md-8">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-5 col-lg-6 d-none d-md-block w-50 bg-sews" id="bg-sews">
                        <img src={{ url('assets/img/photos/login1.png') }} class="img-fluid w-100 mt-5" alt="">
                    </div>
                    <div class="col-md-7 col-lg-6 d-flex align-items-center">
                        <div class="card-body p-3 p-lg-5 text-black">
                            <div class="d-flex align-items-center mb-3 pb-1">
                                <img src={{ url('assets/img/photos/sews.png') }} style="margin-right: 15px;" width="40px" height="40px" alt="">
                                <span class="h1 fw-bold mb-0">Login</span>
                            </div>
                            <p class="text-secondary">Login to our Dashboard</p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input id="email" placeholder="Email Address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label text-secondary" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn text-light w-100" id="bg-sews">
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="mt-3" id="text-sews" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-md-12">
                                        <p class="text-secondary">
                                            Don't have an account?
                                            <a href="{{ route('register') }}" class="mx-2" id="text-sews">Register Here</a>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
