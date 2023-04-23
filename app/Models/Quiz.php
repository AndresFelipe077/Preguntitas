<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relación muchos a uno con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación muchos a muchos con el modelo Question
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    
}
