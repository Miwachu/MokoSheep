<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Log extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    
    protected $fillable = [
    'id',
    'date',
    'weather',
    'situation',
    'A',
    'B',
    'C',
    'D',
    'E',
    'F',
    'image_url',
    'emotion',
    'evidence_of_emotion',
    'counter_evidence_of_emotion',
    'flexible_thought',
    ];
    
    public function getPaginateByLimit(int $limit_count = 5)
    {
    // updated_atで降順に並べたあと、limitで件数制限をかける
    return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    
  
}
