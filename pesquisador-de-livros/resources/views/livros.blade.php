@extends('welcome')
@section('livros')


    <div class="container d-flex justify-content-center flex-wrap ">
        @foreach($livros as $index => $livro)

        <div class="card m-5" style="width: 18rem;">

            <img class="card-img-top" src="{{$livro->getLinkDaImagem()}}" width="80px" height="350px" alt="Card image cap">

            <div class="card-body">
                <h5 class="card-title">{{$livro->getTitulo()}}</h5>
                <p class="card-text">{{$livro->getAutor()}}</p>
                <div class="d-flex justify-content-between">

                    <a href="{{$livro->getLinkDaPreview()}}" class="btn btn-secondary">Preview</a>

                    <a href="#" class="btn btn-primary" data-target="#addbankingModal{{$index}}" data-toggle="modal">Detalhes</a>

                </div>

            </div>

        </div>


        <div class="modal fade" id="addbankingModal{{$index}}" tabindex="-1" role="dialog" aria-labelledby="bankingreferenceLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">

                <div class="modal-header">
                <h3 class="modal-title font-weight-bold" id="exampleModalLabel">{{$livro->getTitulo()}}</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>

                <div class="modal-body">

                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <img class="card-img-top" src="{{$livro->getLinkDaImagem()}}" width="50px" height="550px" alt="Card image cap">
                                </div>
                                <div class="col">
                                    <div>
                                        <p class="font-weight-bold">Descrição</p>
                                        <p class="font-weight-light">{{$livro->getDescricao()}}</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <p class="font-weight-bold mr-2">Autor</p>
                                        <p class="font-weight-light">{{$livro->getAutor()}}</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <p class="font-weight-bold mr-2">Data de publicação.</p>
                                        <p class="font-weight-light">{{$livro->getDataDePublicacao()}}</p>
                                    </div>

                                    <div class="d-flex justify-content-start">
                                        <p class="font-weight-bold mr-2">Editora</p>
                                        <p class="font-weight-light">{{$livro->getEditora()}}</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <p class="font-weight-bold mr-2">Páginas</p>
                                        <p class="font-weight-light">{{$livro->getNumeroDePaginas()}}</p>
                                    </div>




                                </div>
                            </div>

                        </div>
                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
        @endforeach
    </div>




@endsection
