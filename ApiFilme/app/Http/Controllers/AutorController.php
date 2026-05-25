<?php

namespace App\Http\Controllers;
use App\Models\Filme;
use App\Models\Autor;

use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function listar(){
        $query = Autor::query();
        $Autores = $query->get();
        return view('listarAutor', compact('Autores'));
    }

}