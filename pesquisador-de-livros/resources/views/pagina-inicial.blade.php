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


