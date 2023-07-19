<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\AuthServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    private $authService;

    public function __construct(AuthServiceInterface $authService){

        //Declara que o middleware responsável por esse controler será o auth:api e a tarefa de login e register não serão protegidos por esse middleware.
        $this->middleware('jwt.check', ['except' => ['login', 'register']]);

        $this->authService = $authService;
    }

    /**
     * Retorna a view de login
     */
    public function pegarViewLogin (){

        return view('login');

    }

    /**
     * Executa o login, validando os parâmetros, formando o token e retornando para o frontend, em caso de sucesso
     * @param string $email,
     * @param string $password
     *
     * @return json
     */
    public function login (Request $request)
    {

        //valida parâmetros, em caso de falha, retorna os erros
        $request->validate ([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

       $token = $this->authService->login($request);

        if (!$token){


            //Retorna para a pagina de login, com o erro de credenciais incorretas.
            return redirect()->route('paginaLogin')->with('mensagem', 'Credenciais incorretas');

        }

        //Se tudo der certo, redireciona para a pagina inicial
        return redirect()->route('pagina-inicial');

    }

    /**
     *Registra o usuaário
     * @param string $name
     * @param string $email
     * @param string $password
     *
     * @return json
     *
     */
    public function register (Request $request)
    {
        //valida parâmetros, em caso de falha, retorna os erros
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6'
        ]);

        $this->authService->register($request);


        //Se tudo der certo, redireciona para a pagina inicial
        return redirect()->route('pagina-inicial');


    }

    /**
     * Desloga o usuário invalidando o token jwt
     */
    public function logout ()
    {
        $this->authService->logout();

        return redirect()->route('paginaLogin')->with('mensagem', 'Usuário deslogado') ;

    }

    /**
     * Atualiza o token
     */
    public function refresh ()
    {
        $arrayTokenUser = $this->authService->refresh();

        $user = $arrayTokenUser['user'];

        $token = $arrayTokenUser['token'];

        return response()->json([
            'status' => 'success',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);

    }

}
