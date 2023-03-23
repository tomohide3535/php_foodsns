<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <body>
        <x-app-layout>
            @if (Session::has('message'))
                <p>{{ session('message') }}</p>
            @endif
            <p>名前:{{ $my_user->name }}</p>
            <p>メールアドレス:{{ $my_user->email }}</p>
            <div class='photo'>
                <img src="{{ $my_user->my_img }}" alt="画像が読み込めません。"/>
            </div>
            @foreach ($posts as $post)
                <h2 class='title'>
                    <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                </h2>
                <div class='photo'>
                    <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
                </div>
            @endforeach
            
            <!-- マイページ変更画面 -->
            <form action="/my_page2" method="post" enctype='multipart/form-data'> 
                {{ csrf_field() }}
                <!-- 画像内容 -->
                <div>
                    <input type="file" name="my_img">
                </div>
                <input type="submit" value="変更する">
            </form>
        </x-app-layout>
    </body>
</html>