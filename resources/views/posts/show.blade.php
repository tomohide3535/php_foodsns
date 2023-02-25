<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <h1 class="title">
                    {{ $post->title }}
                </h1>
            </x-slot>
                <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                <div class="content">
                    <div class="content__post">
                        <h3>本文</h3>
                        <p>{{ $post->body }}</p>    
                    </div>
                    <div>
                        <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
                    </div>
                    <button onclick="like({{$post->id}})">いいね</button>
                    <button onclick="unlike({{$post->id}})">いいね解除</button>
                </div>
                <div class="edit"><a href="/posts/{{ $post->id }}/edit">edit</a></div>
                <div class="footer">
                    <a href="/">戻る</a>
                </div>
        </x-app-layout>
        <script src="{{ asset('js/like.js') }}"></script>
    </body>
</html>