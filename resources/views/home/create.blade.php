@extends('layouts.app')

@section('content')
<div class="post-create d-flex justify-content-center align-items-center">
    <div class="container-post-create d-flex flex-column w-50">
        <div class="w-100 d-flex justify-content-between">
            <h5>{{isset($post) ?  'Edit Post' : 'New Post' }}</h5>
            <div class="d-flex">
                @error('title')
                    <ion-icon name="alert-circle"></ion-icon>
                @enderror
                @error('text')
                    <ion-icon name="alert-circle"></ion-icon>
                @enderror
            </div>
        </div>
        <div class="w-100">
            <form action="{{ isset($post) ? route('post.update', ['post' => $post->id]) : route('post.store')}}" method="POST">
                @csrf
                @isset($post)
                    @method('PUT')
                @endisset
                <input hidden type="number" id="user_id" name="user_id" value="{{Auth::user()->id ?? old('user_id')}}" >
                <input hidden type="text" id="nickname" name="nickname" value="{{Auth::user()->nickname ?? old('nickname')}}" >
                <div>
                    <input class="input-title @error('title') is-invalid @enderror" type="text" placeholder="What's the post title?" name="title" id="title" value="@error('title'){{$message}}@else{{$post->title ?? @old('title')}}@enderror">
                    <textarea class="textarea-text @error('text') is-invalid @enderror" placeholder="@error('text') {{ $message }} @else What's the new solution? @enderror" name="text" rows="12" id="text" minlength="1" maxlength="1000">{{$post->text ?? @old('text')}}</textarea>
                </div>
                <div class="w-100 bg-dark d-flex justify-content-end align-items-center rounded-pill">
                    <input type="submit" class="font-weight-bold" value="Post">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
