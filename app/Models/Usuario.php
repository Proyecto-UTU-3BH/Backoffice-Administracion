<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="usuarios";

    protected $fillable=[
        "usuario",
        "ci",
        "password",
        "primer_nombre",
        "primer_apellido",
        "segundo_apellido",
        "calle",
        "numero_de_puerta",
        "tipo",
        "telefono",
        "almacen_id"
    ];

    public function Productos(){
        return $this -> belongsToMany(Producto::class,"gestiona");
    }
    
    public function Vehiculo(){
        return $this -> belongsToMany(Vehiculo::class,"maneja");
    }
}
