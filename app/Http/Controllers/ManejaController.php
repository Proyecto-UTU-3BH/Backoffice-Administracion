<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maneja;
use Illuminate\Support\Facades\Validator;

class ManejaController extends Controller
{
    public function ListarManeja(Request $request){
        $maneja = Maneja::all();
        
        return view('listarManeja', [
            "maneja" => $maneja
        ]);
    }
}
