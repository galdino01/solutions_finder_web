@extends('layouts.app')

@section('content')
    <div id="user-area-general" class="container-user home-area bg-color-dark d-flex flex-row">
        <div id="user-area-drop" class="dropdown w-25 h-100">
            <div class="d-flex justify-content-end align-items-center">
                <div class="dropdown-area d-flex justify-content-center align-items-center">
                    <ion-icon name="person-circle-outline"></ion-icon>
                    <button class="user-dropdown dropdown-toggle" type="button" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                        <span>{{Auth::user()->nickname}}</span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownUser">
                        <div class="area d-flex flex-column">
                            <a class="w-100 p-2 rounded-3" href="{{ route('profile') }}">Profile</a>
                            @if (Auth::user()->level == 2)
                                <a class="w-100 p-2 rounded-3" href="@if(Route::has('admin')){{ route('admin') }}@endif">Admin</a>
                            @endif
                        </div>
                        <a class="w-100 p-2 rounded-3 logout" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </div>
            </div>
        </div>
        <div class="posts-area h-100 bg-color-grey">
            <div class="area-btn-new-post new-post-area">
                <a class="btn-new-post d-flex justify-content-center align-items-center" href="{{ route('post.create') }}">{{ __("What's the new solution?") }}</a>
            </div>
            <div id="post-data-index" class="posts-view">
                @foreach ($posts as $post)
                    <div class="post-home d-flex flex-column w-100">
                        <div class="post-head-home d-flex justify-content-start align-items-center w-50">
                            <ion-icon class="user-icon" name="person-circle-outline"></ion-icon>
                            <hr style="margin-left: 5px">
                            <span class="post-user">{{ $post->user->nickname }}</span>
                        </div>
                        <div class="post-body-home w-100">
                            <div class="post-header d-flex justify-content-between align-items-center">
                                <h3 class="post-title pt-2">< {{ $post->title }} ></h3>
                                @if(Auth::user()->id == $post->user_id)
                                    <form action="{{ route('post.destroy', ['post' => $post])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="d-flex justify-content-start align-items-start">
                                            <a href="{{ route('post.edit', ['post' => $post]) }}"><ion-icon name="build"></ion-icon></a>
                                            <button type="submit"><ion-icon name="ban"></ion-icon></button>
                                        </div>
                                    </form>
                                @endif
                            </div>
                            <div class="post-content d-flex flex-column">
                                <textarea id="post-data-index" class="shadow-none post-text pt-2" name="text" id="text" cols="30">"{{ $post->text }}"</textarea>
                                <span class="post-created-at pt-2">~ Posted in {{ $post->created_at }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a href="#user-area-general" class="go-to-top-post justify-content-center align-items-center"><ion-icon name="arrow-up"></ion-icon></a>
        </div>
        <div class="filters w-25 h-100 bg-color-dark">
            <a href="#user-area-drop" class="go-to-top justify-content-center align-items-center"><ion-icon name="arrow-up"></ion-icon></a>
        </div>
    </div>
@endsection
