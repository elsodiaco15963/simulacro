<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $fillable = [
        'universidad',
        'año',
        'asignatura',
        'tema',
        'pregunta',
        'imagen',
        'estado',
        'texto_id'
    ];

    public function texto()
    {
        return $this->belongsTo(Texto::class);
    }

    public function respuesta()
    {
        return $this->hasOne(Respuesta::class);
    }
}
