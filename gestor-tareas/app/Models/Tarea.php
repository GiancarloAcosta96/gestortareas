<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $fillable = [
        'dni',
        'titulo',
        'descripcion',
        'fecha_vencimiento',
        'estado_id',
    ];

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
}
