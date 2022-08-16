@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column align-items-center justify-content-center bg-color-deep-dark h-100">
        <h1 style="color: var(--white);">My Profile</h1>
        <div class="mt-5">
            <div class="bg-color-dark p-4 rounded-3">
                <ul class="nav flex-column">
                    <li class="nav-item d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <label style="color: var(--white);" for="name">Name: </label>
                            <a id="name" class="nav-link" href="#">{{ $user->name }}</a>
                        </div>
                        <a class="edit-user d-flex align-items-center" href="{{ route('user.edit')}}"><ion-icon name="build"></ion-icon></a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <label style="color: var(--white);" for="last_name">Last Name: </label>
                        <a id="last_name" class="nav-link" href="#">{{ $user->last_name }}</a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <label style="color: var(--white);" for="nickname">Nickname: </label>
                        <a id="nickname" class="nav-link" href="#">{{ $user->nickname }}</a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <label style="color: var(--white);" for="email">Email: </label>
                        <a id="email" class="nav-link" href="#">{{ $user->email }}</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="mt-5 w-50">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">TITLE</th>
                        <th scope="col">TEXT</th>
                        <th scope="col">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (App\Models\Post::where('user_id', $user->id)->get() as $post)
                        @if(Auth::user()->id == $post->user_id)
                            <tr>
                                <th scope="row">{{ $post->id }}</th>
                                <td>{{ $post->title }}</td>
                                <td>@if(strlen($post->text) > 30)<div id="parent">{{ substr($post->text, 0, 30)."..." }}<textarea id="popup" class="textarea-text">{{$post->text}}</textarea></div> @else{{ $post->text }}@endif</td>
                                <td>
                                    <form action="{{ route('post.destroy', ['post' => $post])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="d-flex justify-content-start align-items-center actions">
                                            <a class="d-flex justify-content-center align-items-center" href="{{ route('post.edit', ['post' => $post]) }}"><ion-icon name="build"></ion-icon></a>
                                            <button class="d-flex justify-content-center align-items-center" type="submit"><ion-icon name="ban"></ion-icon></button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <a href="#page-top" class="go-to-top-admin justify-content-center align-items-center"><ion-icon name="arrow-up"></ion-icon></a>
            <a href="{{ route('index') }}" class="return justify-content-center align-items-center"><ion-icon name="return-down-back-outline"></ion-icon></a>
        </div>
    </div>
@endsection
