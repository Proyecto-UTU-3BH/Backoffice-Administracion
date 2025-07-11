<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="productos"; 

    protected $fillable=[
        "codRastreo",
        "peso",
        "estado",
        "destino",
        "tipo",
        "forma_entrega",
        "remitente",
        "nombre_destinatario",
        "calle",
        "numero_puerta"
    ];

    public function Usuario(){
        return $this->belongsToMany(Usuario::class,"gestiona");
    }

    public function Almacen(){
        return $this->belongsToMany(Almacen::class,"almacena");
    }
}
