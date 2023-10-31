<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reparte extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="Reparte";

    protected $fillable=[
        "producto_id",
        "almacen_id",
        "vehiculo_id",
        "fechaRealizacion",
        "fechaReparto"
    ];
}
