<?php

namespace App\Http\Controllers;

use App\Models\Emotion;
use App\Models\Log;
use Illuminate\Http\Request;

class EmotionController extends Controller
{

public function create(Emotion $emotion)
{
    return view('emotions.create')->with(['logs' => $emotion->getByEmotion()]);
}

}
