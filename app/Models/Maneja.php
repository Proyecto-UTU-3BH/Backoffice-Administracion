<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Maneja extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="maneja";

    protected $fillable=[
        "usuario_id",
        "vehiculo_id"
    ];
}
