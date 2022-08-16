@extends('layouts.app')

@section('content')
<div class="bg-danger h-100 d-flex justify-content-center align-items-center">
    <a style="font-size: 100px;" class="text-white d-flex flex-column justify-content-center align-items-center" href="{{ route('index') }}">
        Acesso Negado
        <span style="font-size: 20px;" class="text-white">Click here to return</span>
    </a>

</div>
@endsection
