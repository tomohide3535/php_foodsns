<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Post $post)  //引数でpostというモデルを変数の$postにインスタンス化して格納
    {
        return $post->get();  //postモデルのgetメソッドの結果がそのまま返却される
    }
}


