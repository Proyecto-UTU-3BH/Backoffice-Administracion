<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reparte;
use Illuminate\Support\Facades\Validator;

class ReparteController extends Controller
{
    public function ListarRepartos(Request $request){
        $repartos = Reparte::all();
        
        return view('listarRepartos', [
            "repartos" => $repartos
        ]);
    }
}
