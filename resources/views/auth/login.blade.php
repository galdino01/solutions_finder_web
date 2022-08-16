@extends('layouts.app')

@section('content')
<div class="bg-color-dark d-flex justify-content-center">
    <div class="container-area d-flex">
        <section class="header flex-column justify-content-center align-items-center">
            <div class="h-100 d-flex justify-content-center align-items-center">
                <h1 class="title-left">SOLUTIONS</h1><h1 class="title-right">FINDER</h1>
            </div>
            <div class="h-100 d-flex justify-content-center align-items-center">
                <ion-icon class="rocket" name="rocket-outline"></ion-icon>
            </div>
            <div class="h-100 d-flex justify-content-center align-items-center text-center">
                <span>All rights reserved | Solutions Finder &copy;</span>
            </div>
        </section>
        <section class="bg-color-white login">
            <div class="d-flex flex-column justify-content-center align-items-center h-100">
                <div class="h-100 title-login justify-content-center align-items-center">
                    <h1 class="title-left">LOGIN</h1>
                </div>
                <form class="h-100 d-flex flex-column justify-content-center" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="text-field">
                        <input required autofocus id="email" type="email" name="email" autocomplete="email" value="{{ old('email') }}" class="@error('email') invalid-field @enderror">
                        <span></span>
                        <label for="email" >{{ __('E-MAIL') }}</label>
                        @error('email')
                            <div class="mt-2">
                                <span class="invalid-message" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            </div>
                        @enderror
                    </div>
                    <div class="text-field">
                        <input required id="password" type="password" name="password" autocomplete="current-password" class="@error('password') is-invalid @enderror">
                        <span></span>
                        <label for="password">{{ __('PASSWORD') }}</label>
                        @error('password')
                            <div class="mt-1">
                                <span class="invalid-message" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            </div>
                        @enderror
                    </div>
                    @if (Route::has('password.request'))
                    <div class="mb-5 p-0">
                        <a class="forgot-pass" href="{{ route('password.request') }}">Forgot Password?</a>
                    </div>
                    @endif
                    <input type="submit" value="Login">
                    <div class="signup-link">
                        Don't have an account yet?
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">
                                {{ __("Sign Up") }}
                            </a>
                        @endif
                    </div>
                </form>
                <div class="h-100 info-login justify-content-center align-items-center text-center p-5">
                    <span>We have a total of {{count(App\Models\User::all())}} {{ count(App\Models\User::all()) > 1 ? 'registered users' : 'registered user' }}. Come join you too!</span>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
