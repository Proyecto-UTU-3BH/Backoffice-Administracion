<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Va extends Model
{
    use HasFactory;
    use softDeletes;
    protected $table="va";

    protected $fillable=[
        "ruta_id",
        "almacen_id",
        "vehiculo_id",
        "fecha",
        "horallegada",
        "horasalida",
    ];
}
