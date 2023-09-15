<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Log extends Model
{
    use HasFactory;
    
    
    protected $fillable = [
    'id',
    'date',
    'weather',
    'situation',
    'image_url',
    'emotion',
    'evidence_of_emotion',
    'counter_evidence_of_emotion',
    'flexible_thought',
    ];
    //記録に対するリレーション
    public function Emotions(){
        //生徒は多数の科目を履修。
        return $this->belongsToMany(Emotion::class);
    }
    
}
