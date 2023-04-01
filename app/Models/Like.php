<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'post_id'];
    
    public function user()
    {   //usersテーブルとのリレーションを定義するuserメソッド
        return $this->belongsTo(User::class);
    }
    
    public function post()
    {   //postsテーブルとのリレーションを定義するreviewメソッド
        return $this->belongsTo(Post::class);
    }
    
    public function like_exist($user_id, $post_id)
    {
        $is_like = Like::where('user_id', $user_id)->where('post_id', $post_id)->exists();
        
        return $is_like;
    }
}
