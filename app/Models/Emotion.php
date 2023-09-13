<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emotion extends Model
{
    use HasFactory;
    
     protected $fillable = [
    'id',
    'emotion_data',
    'emotion_percentage',
    ];
        //に対するリレーション
    public function Logs(){
        //生徒は多数の科目を履修。
        return $this->belongsToMany(Log::class);
    }       
}
