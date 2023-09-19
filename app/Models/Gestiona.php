<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gestiona extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="gestiona";

    protected $fillable=[
        "IDLote",
        "fecha"
    ];

}
