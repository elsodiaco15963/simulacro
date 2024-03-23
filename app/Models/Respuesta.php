<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;
    protected $fillable = [
        'opcion_1',
        'opcion_2',
        'opcion_3',
        'opcion_4',
        'opcion_5',
        'correcta',
        'resolucion',
        'estado',
        'pregunta_id',
    ];

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class, 'pregunta_id');
    }
}
