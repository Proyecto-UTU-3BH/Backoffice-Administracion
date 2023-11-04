<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Realiza;
use Illuminate\Support\Facades\Validator;

class RealizaController extends Controller
{
    public function ListarRealiza(Request $request){
        $realiza = Realiza::all();
        
        return view('listarRealiza', [
            "realiza" => $realiza
        ]);
    }
}
