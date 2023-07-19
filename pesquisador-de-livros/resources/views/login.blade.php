@extends('pagina-padrao')

@section('login')
<body style="background-color: #494949;" >
 <section class="vh-100" >
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <h3 class="mb-5">Login</h3>
            <form action="/login" method="POST">
            @csrf
              <div class="form-outline mb-4">
                <input type="email" name="email" id="typeEmailX-2" class="form-control form-control-lg" />
                <label class="form-label" for="typeEmailX-2">Email</label>
                @if($errors->has('email'))
                    <div class="mb-4 mt-2">
                        <span class="alert alert-danger">{{$errors->first('email')}}</span>
                    </div>
                @endif
              </div>

              <div class="form-outline mb-4">
                <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg" />
                <label class="form-label" for="typePasswordX-2">Senha</label>
                @if($errors->has('password'))
                    <div class="mb-4 mt-2">
                        <span class="alert alert-danger">{{$errors->first('password')}}</span>
                    </div>
                @endif
              </div>

            @if(session()->has('mensagem'))
                <div class="alert alert-danger">
                    <span>{{session()->get('mensagem')}}</span>
                </div>
             @endif


              <button class="btn btn-primary btn-lg btn-block" type="submit">Logar</button>

              <a href="{{route('paginaCadastro')}}" class="btn btn-outline-secondary btn-lg btn-block">Cadastrar</a>

              <hr class="my-4">
            </form>
              <!--<button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;"
                type="submit"><i class="fab fa-google me-2"></i> Sign in with google</button>
              <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;"
                type="submit"><i class="fab fa-facebook-f me-2"></i>Sign in with facebook</button>-->

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
  @endsection
