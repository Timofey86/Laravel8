@extends('layout.app')

@section('title', 'Главная страница')

@section('content')
    @include('partials.header')
    <h1>{{$version}}</h1>
{{--    <x-test :posts="$posts" count="10"></x-test><br>--}}
    <x-test2 class="my-10">
        <x-slot name="header" class="my-5">
                Im Header
        </x-slot><br>
        Hello world
        <x-slot name="footer"><br>
        Im Footer
        </x-slot>
    </x-test2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-10 mb-20">
        @foreach($posts as $post)
            @include("posts.partials.item", ["post" => $post])
        @endforeach
    </div>
@endsection
