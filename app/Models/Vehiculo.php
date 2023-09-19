<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehiculo extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="vehiculos";

    protected $fillable= [
        "matricula",
        "tipo",
        "capacidad",
        "estado"
    ];

    public function Usuario(){
        return $this->belongsToMany(Usuario::class,"maneja");
    }

    public function gestiona()
    {
        return $this->hasMany(Gestiona::class);
    }
}
