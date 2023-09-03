<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cloudinary;  //use宣言するのを忘れずに

class PostController extends Controller
{
    public function index()
    {
        return view('posts/index');
    }
    
    public function create()
    {
        return view('/posts/create');  //create.blade.phpを表示
    }
    
    public function show(Post $post)
    {
        return view('/posts/show')->with(['post' => $post]);
    }
    
    public function store(Request $request, Post $post)
    {
        //cloudinaryへ画像を送信し、画像のURLを$image_urlに代入している
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        dd($image_url);  //画像のURLを画面に表示

        $input += ['image_url' => $image_url];  //追加
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
}