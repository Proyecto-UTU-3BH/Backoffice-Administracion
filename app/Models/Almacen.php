<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Almacen extends Model
{
    use HasFactory;
    use softDeletes;
    protected $table="almacenes";

    protected $fillable=[
        "departamento",
        "calle",
        "numero_puerta",
        "latitud",
        "longitud",
        "telefono",
        "capacidad"
    ];

    public function Productos(){
        return $this->belongsToMany(Producto::class,"almacena");
    }

}
