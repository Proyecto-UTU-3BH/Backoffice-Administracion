<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ruta extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="rutas";

    protected $fillable=[
        "destino",
        "recorrido"
    ];

    public function paradas()
    {
        return $this->hasMany(Parada::class);
    }
}
