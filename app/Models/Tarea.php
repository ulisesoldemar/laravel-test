<?php

namespace App\Models;

use App\Scopes\UserScope;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'tarea', 'descripcion', 'categoria'];

    protected static function booted()
    {
        static::addGlobalScope(new UserScope);
    }

    public function user()
    {
        // belongsTo nos permite acceder a la relación a través del modelo sin
        // necesidad de joins, etc.
        return $this->belongsTo(User::class);
    }

    public function etiquetas()
    {
        // Belongs to many nos permite acceder a la relación m -> n
        // entre las dos tablas
        return $this->belongsToMany(Etiqueta::class);
    }

    // get = Accesor, son atributos "virtuales", por ejemplo, combinando dos columnas de la 
    // base de datos o formateando la salida a mayúsculas
    // set = Mutator, modifica el atributo enviado desde el formulario a nivel de modelo, sin
    // necesidad de modificar el controlador
    protected function tarea(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => strtoupper($value),
            set: fn ($value) => strtolower($value)
        );
    }
}
