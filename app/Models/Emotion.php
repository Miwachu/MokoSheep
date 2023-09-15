<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emotion extends Model
{
    use HasFactory;
    
     protected $fillable = [
    'id',
    'A',
    'percentage_of_A',
    'B',
    'percentage_of_B',
    'C',
    'percentage_of_C',
    'D',
    'percentage_of_D',
    'E',
    'percentage_of_E',
    'F',
    'percentage_of_F',
    ];
    
        //に対するリレーション
    public function Logs(){
        //生徒は多数の科目を履修。
        return $this->belongsToMany(Log::class);
    }       
}
