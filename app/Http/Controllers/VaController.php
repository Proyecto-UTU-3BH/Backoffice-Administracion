<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Va;

class VaController extends Controller
{
    public function ListarVa(Request $request){
        $va = Va::all();
        
        return view('listarVa', [
            "va" => $va
        ]);
    }
}
