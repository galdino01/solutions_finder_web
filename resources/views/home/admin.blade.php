@extends('layouts.app')

@section('content')
<div id="page-top" class="h-100">
    <div class="container-fluid row justify-content-between pt-2 pb-2 h-100">
        <div class="col-lg-6">
            <table class="table table-dark table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NAME</th>
                        <th scope="col">LAST NAME</th>
                        <th scope="col">NICKNAME</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">LEVEL</th>
                        <th scope="col">CREATED AT</th>
                        <th scope="col">UPDATED AT</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->nickname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->level }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-lg-5">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">TITLE</th>
                        <th scope="col">TEXT</th>
                        <th scope="col">AUTHOR</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td>@if(strlen($post->text) > 30)<div id="parent">{{ substr($post->text, 0, 30)."..." }}<div id="popup">{{$post->text}}</div></div> @else{{ $post->text }}@endif</td>
                            <td>{{ $post->user->nickname }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <a href="#page-top" class="go-to-top-admin justify-content-center align-items-center"><ion-icon name="arrow-up"></ion-icon></a>
            <a href="{{ route('index') }}" class="return justify-content-center align-items-center"><ion-icon name="return-down-back-outline"></ion-icon></a>
        </div>
    </div>
</div>
@endsection
