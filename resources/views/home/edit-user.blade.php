@extends('layouts.app')

@section('content')
    <section class="bg-color-white w-100 h-100">
        <div class="d-flex flex-column justify-content-center align-items-center h-100">
            <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                <form method="POST" action="{{ route('user.update', ['user' => $user->id]) }}">
                    @csrf
                    @isset($user)
                        @method('PUT')
                    @endisset
                    <div class="title-login justify-content-center align-items-center h-25">
                        <h1 class="title-left">EDIT MY DATA</h1>
                    </div>
                    <div class="h-50">
                        <div class="@error('name') text-field-invalid @else text-field @enderror">
                            <input required autofocus id="name" type="text" name="name" autocomplete="name" value="{{ $user->name ?? old('name') }}">
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
                            <input required id="last-name" type="text"  name="last_name" autocomplete="last-name" value="{{ $user->last_name ?? old('last_name') }}">
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
                            <input required id="nickname" type="text" name="nickname" autocomplete="nickname" value="{{ $user->nickname ?? old('nickname') }}">
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
                            <input required id="email" type="email" name="email" autocomplete="email" value="{{ $user->email ?? old('email') }}">
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
                    </div>
                    <div class="h-25">
                        <input type="submit" value="Edit">
                        <a class="d-flex justify-content-center align-items-center button-cancel" href="{{ route('profile') }}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
