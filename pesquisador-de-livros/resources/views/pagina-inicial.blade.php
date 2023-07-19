@extends('pagina-padrao')

@section('pagina-inicial')

   <!--- Navbar --->
   <nav class="navbar navbar-expand-lg" style="background-color: #484848;">
    <div class="container">
        <a class="navbar-brand text-white" href="{{route('pagina-inicial')}}"><i class="fa fa-graduation-cap fa-lg mr-2"></i>Pesquisador de livros</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nvbCollapse" aria-controls="nvbCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nvbCollapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item pl-1">
                    <a class="nav-link" href="{{route('pagina-inicial')}}"><i class="fa fa-home fa-fw mr-1"></i>Pesquisar</a>
                </li>
                <li class="nav-item pl-1">
                    <a class="nav-link" href="#"><i class="fa fa-home fa-fw mr-1"></i>Favoritados</a>
                </li>
                <li class="nav-item pl-1">
                    <a class="nav-link" href="{{route('logout')}}"><i class="fa fa-home fa-fw mr-1"></i>Logout</a>
                </li>
                <li class="nav-item pl-1" style="margin-auto;">
                        <div class="mt-1 d-flex justify-content-between align-items-center">
                            @if(session()->has('nome'))

                                <a href="#" class="btn btn-outline-secondary ml-3 pb-0 pr-5 pl-5 pt-1 d-flex justify-content-between align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-person" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                                    </svg>
                                    <p class="ml-0 mr-0 mt-0 mb-1" style="color:white;"><strong>{{session()->get('nome')}}</strong></p>
                                </a>
                            @endif
                        </div>
                </li>

            </ul>
        </div>
    </div>
</nav>
<!--# Navbar #-->



<div class="aba-pesquise-seus-livros border-bottom border-4 border-light p-5">

    <div >

        <h1 class="text-center font-weight-bold text-uppercase " style="color:white">Pesquise seus livros</h1>
    </div>

    <div class="d-flex justify-content-center bg-light  ">



        <div>

            <nav class="navbar navbar-light" id="navegacao">

                    <form class="form-inline" method="POST" action="/livro" >
                        {{ csrf_field() }}
                        <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar livro" aria-label="Search" name="nomeLivro">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <button class="btn btn-success my-2 my-sm-0" type="submit">Pesquisar</button>
                    </form>



             </nav>

        </div>


     </div>

</div>

@yield('livros')

@endsection


