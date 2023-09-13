<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Request\LogRequest;
use App\Models\Log;
use App\Models\Emotion;
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
        return view('logs.index')>with(['logs' =>$log]);
    }
    
    public function show(Log $log)
    {
        return view('logs.show')->with(['log' => $log]);
     //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }

    public function create(Emotion $emotion)
    {
        return view('Emotions.create')->with(['emotions' => $emotion->get()]);
    }

    public function store(Request $request, Log $log)
    {
        $input = $request['log'];
         //cloudinaryへ画像を送信し、画像のURLを$image_urlに代入している
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        dd($image_url);  //画像のURLを画面に表示
        $input += ['image_url' => $image_url];  //追加
        $log->fill($input)->save();
        return redirect('/logs/' . $log->id);
    }
    
    public function edit(Log $log)
    {
        return view('logs.edit')->with(['log' => $log]);
    }
    
    public function update(LogRequest $request, Log $log)
    {
        $input_log = $request['log'];
        $log->fill($input_log)->save();
    
        return redirect('/logs/' . $log->id);
    }
    
    public function delete(Log $log)
    {
        $log->delete();
        return redirect('/');
    }
    
}
