@extends('layouts.app')

@section('content')
<div class="bg-color-deep-dark d-flex justify-content-center">
    <div class="container-area d-flex align-items-center justify-content-around">
        <section class="header flex-column justify-content-center align-items-center">
            <div class="h-25 d-flex justify-content-center align-items-center">
                <h1 class="title-left">SOLUTIONS</h1><h1 class="title-right">FINDER</h1>
            </div>
            <div class="h-50 d-flex justify-content-center align-items-center">
                <ion-icon class="rocket" name="rocket-outline"></ion-icon>
            </div>
            <div class="h-25 d-flex justify-content-center align-items-center text-center">
                <span>We have a total of {{count(App\Models\User::all())}} {{ count(App\Models\User::all()) > 1 ? 'registered users' : 'registered user' }}. Come join you too!</span>
            </div>
        </section>
        <section class="bg-color-white register">
            <div class="d-flex flex-column justify-content-center align-items-center h-100">
                <div class="title-register justify-content-center align-items-center">
                    <h1 class="title-left">SOLUTIONS</h1><h1 class="title-right">FINDER</h1>
                </div>
                <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        @isset($user)
                            @method('PUT')
                        @endisset
                        <div class="title-login justify-content-center align-items-center h-25">
                            <h1 class="title-left">REGISTER</h1>
                        </div>
                        <div class="h-50">
                            <div class="@error('name') text-field-invalid @else text-field @enderror">
                                <input required autofocus id="name" type="text" name="name" autocomplete="name">
                                <span></span>
                                <label for="name">{{ __('NAME') }}</label>
                                @error('name')
                                    <div class="mt-2">
                                        <span class="invalid-message" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    </div>
                                @enderror
                            </div>
                            <div class="@error('last-name') text-field-invalid @else text-field @enderror">
                                <input required id="last-name" type="text"  name="last_name" autocomplete="last-name">
                                <span></span>
                                <label for="last-name">{{ __('LAST NAME') }}</label>
                                @error('last-name')
                                    <div class="mt-2">
                                        <span class="invalid-message" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    </div>
                                @enderror
                            </div>
                            <div class="@error('nickname') text-field-invalid @else text-field @enderror">
                                <input required id="nickname" type="text"  name="nickname" autocomplete="nickname">
                                <span></span>
                                <label for="nickname">{{ __('NICKNAME') }}</label>
                                @error('nickname')
                                    <div class="mt-2">
                                        <span class="invalid-message" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    </div>
                                @enderror
                            </div>
                            <div class="@error('email') text-field-invalid @else text-field @enderror">
                                <input required id="email" type="email" name="email" autocomplete="email" value="{{ old('email') }}">
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
                            <div class="@error('password') text-field-invalid @else text-field @enderror">
                                <input required id="password" type="password"  name="password" autocomplete="current-password">
                                <span></span>
                                <label for="password">{{ __('PASSWORD') }}</label>
                                @error('password')
                                    <div class="mt-2">
                                        <span class="invalid-message" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    </div>
                                @enderror
                            </div>
                            <div class="@error('password-confirmation') text-field-invalid @else text-field @enderror">
                                <input required id="password-confirmation" type="password"  name="password_confirmation" autocomplete="new-password">
                                <span></span>
                                <label for="password-confirmation">{{ __('CONFIRM PASSWORD') }}</label>
                                @error('password-confirmation')
                                    <div class="mt-2">
                                        <span class="invalid-message" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="h-25">
                            <input type="submit" value="Register">
                            <a class="d-flex justify-content-center align-items-center button-cancel" href="{{ route('home') }}">Cancel</a>
                        </div>
                    </form>
                </div>
                <div class="info-register justify-content-center align-items-center text-center p-5">
                    <span>We have a total of {{count(App\Models\User::all())}} {{ count(App\Models\User::all()) > 1 ? 'registered users' : 'registered user' }}. Come join you too!</span>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
