@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row w-100 mt-4 justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-7 col-lg-6 d-flex align-items-center">
                        <div class="card-body p-1 p-lg-4 text-black">
                            <div class="d-flex align-items-center mb-3 pb-1">
                                <img src={{ url('assets/img/photos/sews.png') }} style="margin-right: 15px;" width="40px" height="40px" alt="">
                                <span  class=" butt h1 fw-bold mb-0">Register</span>
                            </div>
                            <p class="text-secondary">Sign up to our Dashboard</p>
                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" >
                                @csrf

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input id="name" type="text" placeholder="Enter Your Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input id="email" type="email" placeholder="Enter Your Email Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3"> 
                                    <div class="col-md-12">
                                        <label for="image" class="form-label">{{ __('Profile Picture') }}</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image">
                                    </div>
                                  @error('image')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                      
                                  @enderror

                                    
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <select id="user_type" name="user_type" class="form-control">
                                            <option value="Choose_your_Type" class="text-secondary">--Choose your Type--</option>
                                            <option value="user">User</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input id="password" type="password" placeholder="Enter a Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input id="password-confirm" placeholder="Confirm Your Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn text-light w-100" id="bg-sews">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <p class="text-secondary">
                                            Do You have an account?
                                            <a href="{{ route('login') }}" class="mt-0 mx-1" id="text-sews">Login Here</a>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-6 d-none d-md-block w-50" id="bg-sews">
                        <img src={{ url('assets/img/photos/register1.png') }} class="img-fluid w-100 mt-5 pt-4" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
