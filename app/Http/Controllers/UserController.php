<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Cloudinary;


class UserController extends Controller
{
    public function index()
    {
        
        $user = auth()->user();
        $posts = Post::where('user_id', $user->id)->get();
        return view('my_page', ['my_user' => $user, 'posts' => $posts]);
    }
    
    public function my_page_update(Request $request)
    {
        if($request->hasFile('my_img')) {
            $id = Auth::id();
            $photo_path = Cloudinary::upload($request->file('my_img')->getRealPath())->getSecurePath();
            // DBの対象カラムを更新する
            $user = User::find($id);
            $user->my_img = $photo_path;
            $user->save();
            // 画像に表示させる
            return redirect("/my_page2")->with([
                "message" => "マイページ画像を変更しました。",
                "top_image_pass" => $photo_path 
            ]);
        }
    }
}

