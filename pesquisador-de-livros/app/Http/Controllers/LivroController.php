<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\LivroServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LivroController extends Controller
{
    private $livroService;

    //Inversão de dependência. Deve-se definir a implementação na classe APPSERVICEPROVIDER.
    public function __construct(LivroServiceInterface $livroService){
        $this->livroService = $livroService;

    }
    //Vai chamar o service, buscar os livros no fornecedor e retornar para uma view
    public function buscarLivros(Request $requisicao){

        $requisicao->validate( ['nomeLivro' => 'required|string|max:64']);
        $arrayLivros = $this->livroService->buscarLivros($requisicao->nomeLivro);

        //dd($arrayLivros);
        return view('livros', ['livros' => $arrayLivros]);

    }
}
