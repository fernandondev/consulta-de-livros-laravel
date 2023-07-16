<?php

namespace App\Services;

use App\Dto\LivroDto;
use App\Services\Interfaces\LivroServiceInterface;
use \Error as Error;
use \Exception as Exception;
use Illuminate\Support\Facades\Http;

class LivroService implements LivroServiceInterface {

    /*Esse método vai fazer a conexão com o google e pegar os livros de acordo com o parâmetro passado*/
    public function buscarLivros(string $nomeLivro){

        //Faz a chamada para a api do google de livros
        $response = Http::withUrlParameters([
            'q' => 'intitle:'.$nomeLivro,
            'printType' => 'books',
            'orderBy' => 'newest',
            'maxResults' => 40
        ])->get(strval(env('URL_GOOGLE')).'/books/v1/volumes');
        //https://www.googleapis.com/books/v1/volumes?q=intitle:percy&printType=books&orderBy=newest&maxResults=39
        $response = Http::get(strval(env('URL_GOOGLE').'/books/v1/volumes?q=intitle:'.$nomeLivro.'&printType=books&orderBy=newest&maxResults=40'));

        if($response->ok()){

            $responseArray = $response->json();
            $listaLivrosDtoRetorno = [];

            //dd($responseArray);
            if(intval($responseArray['totalItems']) >0 ){
                $itensArray = $responseArray['items'];
                //dd($item0 = $responseArray['items'][0]['volumeInfo']['imageLinks']['smallThumbnail']);

                //Itera todos os registros de livros mandados pela api do google
                foreach($itensArray as $item){
                    $livroDto = new LivroDto($this->pegarItemArrayRetorno($item['volumeInfo'], 'title'),
                                            $this->pegarItemArrayRetorno($this->pegarItemArrayRetorno($item['volumeInfo'], 'authors'), 0),
                                            $this->pegarItemArrayRetorno($this->pegarItemArrayRetorno($item['volumeInfo'], 'imageLinks'), 'smallThumbnail'),
                                            $this->pegarItemArrayRetorno($item['volumeInfo'], 'publishedDate'),
                                            $this->pegarItemArrayRetorno($item['volumeInfo'], 'publisher'),
                                            $this->pegarItemArrayRetorno($item['volumeInfo'], 'pageCount'),
                                            $this->pegarItemArrayRetorno($item['volumeInfo'], 'description'),
                                            $this->pegarItemArrayRetorno($item['volumeInfo'], 'previewLink')
                                        );
                    array_push($listaLivrosDtoRetorno, $livroDto);
                }
                $listaLivrosDtoRetorno = $this->removerRegistrosDuplicadosArray($listaLivrosDtoRetorno);

            }

            return $listaLivrosDtoRetorno;


        }

        return [];
    }

    /*
    Esse método é usado para pegar qualquer exceção durante a extração do dado do retorno do fornecedor e setá-lo como uma string vazia
    */
    public function pegarItemArrayRetorno($array, $chave){
        try{
            if(is_array($array)){
                $resultado = $array[$chave];
                return $resultado;
            }else{
                return '';
            }



        }catch(Exception $e){
            return '';
        }

    }

    function removerRegistrosDuplicadosArray($array){
        $duplicate_keys = array();
        $tmp = array();

        foreach ($array as $key => $val){

            if (is_object($val))
                $val = (array)$val;

            if (!in_array($val, $tmp))
                $tmp[] = $val;
            else
                $duplicate_keys[] = $key;
        }

        foreach ($duplicate_keys as $key)
            unset($array[$key]);

        return  array_values($array);
    }


}
