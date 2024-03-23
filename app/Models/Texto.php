<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Texto extends Model
{
    use HasFactory;
    protected $fillable = [
        'texto',
        'estado',
    ];

    public function preguntas()
    {
        return $this->hasMany(Pregunta::class);
    }
}
