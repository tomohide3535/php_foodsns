<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{asset('/css/styles.css')}}" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    </head>
    <body>
        <div class='full-page'>
            <x-app-layout>
                <h1>Blog timeline</h1>
                <div class='posts'>
                    @foreach ($posts as $post)
                        <div class='post'>
                            <div class='inner'>
                                <h2 class='title'>
                                    <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                                </h2>
                                <div class='post_user'>
                                    <a href="/profile">投稿者：{{ Auth::user()->name }}</a>
                                </div>
                                <div class='category'>
                                    <a href="/categories/{{ $post->category->id }}">category:{{ $post->category->name }}</a>
                                </div>
                                <div class='photo'>
                                    <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
                                </div>
                                <p class='body'>{{ $post->body }}</p>
                                <!--<button onclick="like({{$post->id}})">いいね</button>-->
                                <!--<button onclick="unlike({{$post->id}})">いいね解除</button>-->
                                @auth
                                @if (!$post->isLikedBy(Auth::user()))
                                    <span class="likes">
                                        <i class="fas fa-heart like-toggle" data-post-id="{{ $post->id }}"></i>
                                    <span class="like-counter">{{$post->likes_count}}</span>
                                    </span><!-- /.likes -->
                                @else
                                    <span class="likes">
                                        <i class="fas fa-heart heart like-toggle liked" data-post-id="{{ $post->id }}"></i>
                                    <span class="like-counter">{{$post->likes_count}}</span>
                                    </span><!-- /.likes -->
                                @endif
                                @endauth
                                <p class='image'>{{ $post->image}}</p>
                                <div class='delete'>
                                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                                    </form>
                                </div>
                            </div>
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
        </div>
    </body>
</html>