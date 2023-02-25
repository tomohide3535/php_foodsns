<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                index
            </x-slot>
                <h1>Blog Name</h1>
                <a href='/posts/create'>create</a>
                <div class='posts'>
                    @foreach ($posts as $post)
                        <div class='post'>
                            <h2 class='title'>
                                <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                            </h2>
                            <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                            <p class='body'>{{ $post->body }}</p>
                            <div>
                                <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
                            </div>
                            <button onclick="like({{$post->id}})">いいね</button>
                            <button onclick="unlike({{$post->id}})">いいね解除</button>
                            <p class='image'>{{ $post->image}}</p>
                            <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                            </form>
                        </div>
                    @endforeach
                </div>
                <div class='paginate'>
                    {{ $posts->links() }}
                </div>
                <div class='user'>
                    ログインユーザー：{{ Auth::user()->name }}
                </div>
                
            </x-app-layout>
        <script>
            function deletePost(id) {
                'use strict'
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
        <script src="{{ asset('/js/like.js') }}"></script>
    </body>
</html>