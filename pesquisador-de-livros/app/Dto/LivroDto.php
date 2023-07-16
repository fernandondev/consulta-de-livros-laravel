<?php

namespace App\Dto;

class LivroDto{



    private string $titulo;
    private string $autor;
    private string $linkDaImagem;
    private string $dataDePublicacao;
    private string $editora;
    private string $numeroDePaginas;
    private string $descricao;
    private string $linkDaPreview;


    public function __construct(string $titulo, string $autor, string $linkDaImagem, string $dataDePublicacao, string $editora, string $numeroDePaginas, string $descricao, string $linkDaPreview){
        $this->titulo = $titulo ;
        $this->autor =$autor ;
        $this->linkDaImagem = $linkDaImagem ;
        $this->dataDePublicacao = $dataDePublicacao ;
        $this->editora = $editora ;
        $this->numeroDePaginas = $numeroDePaginas ;
        $this->descricao =  $descricao;
        $this->linkDaPreview = $linkDaPreview;
    }

    public function getTitulo(){
        return $this->titulo;
    }
    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }
    public function getAutor(){
        return $this->autor;
    }
    public function setAutor($titulo){
        $this->titulo = $titulo;
    }

    public function getLinkDaImagem(){
        return $this->linkDaImagem;
    }
    public function setLinkDaImagem($linkDaImagem){
        $this->linkDaImagem = $linkDaImagem;
    }
    public function getDataDePublicacao(){
        return $this->dataDePublicacao;
    }
    public function setDataDePublicacao($dataDePublicacao){
        $this->dataDePublicacao = $dataDePublicacao;
    }
    public function getEditora(){
        return $this->editora;
    }
    public function setEditora($editora){
        $this->editora = $editora;
    }
    public function getNumeroDePaginas(){
        return $this->numeroDePaginas;
    }
    public function setNumeroDePaginas($numeroDePaginas){
        $this->numeroDePaginas = $numeroDePaginas;
    }
    public function getDescricao(){
        $stringRetorno = $this->descricao;
        if(strlen($stringRetorno > 700)){
            $stringRetorno = substr($this->descricao, 0, 700).'...';
        }
        return  $stringRetorno;
    }
    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getLinkDaPreview(){
        return $this->linkDaPreview;
    }
    public function setLinkDaPreview($linkDaPreview){
        $this->linkDaPreview = $linkDaPreview;
    }


}
