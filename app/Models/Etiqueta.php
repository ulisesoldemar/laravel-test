<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    use HasFactory;
    // No actualiza los timestamps
    public $timestamps = false;

    public function tareas()
    {
        return $this->belongsToMany(Tarea::class);
    }
}
