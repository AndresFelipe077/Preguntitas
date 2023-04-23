<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['body'];

    // Relación muchos a uno con el modelo Question
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    
}
