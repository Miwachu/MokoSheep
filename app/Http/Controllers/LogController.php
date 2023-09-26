<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Request\LogRequest;
use App\Models\Log;
use App\Models\User;
use Cloudinary; 

class LogController extends Controller
{
    public function home()
    {
        return view('logs.home');
    }
  
    public function index(Log $log)
    {
        return view('logs.index')->with(['logs' =>$log->getPaginateByLimit()]);
    }
    
    public function show(Log $log)
    {
        return view('logs.show')->with(['log' => $log]);
     //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }
    
    public function create(Log $log)
    {
        return view('logs.create')->with(['logs' => $log->get()]);
    }
    
    public function store(Log $log,Request $request)
    {   
        // dd($request);
        $input = $request['log'];
         //cloudinaryへ画像を送信し、画像のURLを$image_urlに代入している
          if($request->file('image')){
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        dd($image_url);  //画像のURLを画面に表示
        $input += ['image_url' => $image_url];
        }//追加
        $log->timestamps=false;
        $log->fill($input)->save();
        
        return view('logs.home');
    }
    
    public function edit(Log $log)
    {
        return view('logs.edit')->with(['log' => $log]);
    }
    
    public function update(Request $request, Log $log)
    {
        $input = $request['log'];
        $log->fill($input)->save();
    
        return redirect('/logs');
    }
    
    public function delete(Log $log)
    {
        $log->delete();
        $log->save();


        return redirect('/');
    }
    
}
