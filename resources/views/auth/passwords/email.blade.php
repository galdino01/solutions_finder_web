@extends('layouts.app')

@section('content')
<div class="post-create d-flex justify-content-center align-items-center">
    <div class="container-post-create d-flex flex-column w-50">
        <div class="w-100 d-flex justify-content-between">
            <h5>{{ __('Reset Password') }}</h5>
        </div>
        <div class="w-100 h-100">
            <form class="h-100" action="{{ route('password.email') }}" method="POST">
                @csrf
                <div class="d-flex flex-column justify-content-center h-100">
                    <div class="h-25">
                        <input id="email" type="email" class="input-title @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="EMAIL" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="w-100 h-50 p-2">
                        @if (session('status'))
                            <div style="font-size: 28px" class="alert alert-success w-100 h-100" role="alert">
                                Your password reset link has been sent successfully.<br>
                                Check your email to proceed.
                            </div>
                        @endif
                    </div>
                    <div class="w-100 h-25 d-flex justify-content-center align-items-center rounded-pill">
                        <input type="submit" class="font-weight-bold" value="Send Password Reset Link">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
