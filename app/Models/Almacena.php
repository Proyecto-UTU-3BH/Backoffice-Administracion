<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Almacena extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="almacena";

    protected $fillable=[
        "producto_id",
        "almacen_id"
    ];
}
