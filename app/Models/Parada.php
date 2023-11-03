<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parada extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="paradas";

    protected $fillable=[
        "ruta_id",
        "latitud",
        "longitud"
    ];

    public function ruta()
    {
        return $this->belongsTo(Ruta::class);
    }
}
