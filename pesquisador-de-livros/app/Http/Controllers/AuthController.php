<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\AuthServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    private $authService;

    public function __construct(AuthServiceInterface $authService){

        $this->authService = $authService;

    }

    /**
     * Retorna a view de login
     */
    public function pegarViewLogin () {

        return view('login');

    }

    /**
     * Retorna a view de cadastro
     */
    public function pegarViewCadastro () {

        return view('cadastro');

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

        ],
        [

            'email.required' => 'O email é obrigatório',
            'email.string' => 'O email deve ser um texto',
            'email.email' => 'O parâmetro inserido não é um email válido',

            'password.required' => 'A senha é obrigatória',
            'password.string' => 'A senha deve ser um texto'

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

            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'confirmPassword' => 'required|string|min:6|same:password'

        ],[
            'nome.required' => 'O nome é obrigatório',
            'nome.string' => 'O nome deve ser um texto',
            'nome.max' => 'O nome deve conter menos de 255 caracteres',

            'email.required' => 'O email é obrigatório',
            'email.string' => 'O email deve ser um texto',
            'email.email' => 'O parâmetro inserido não é um email válido',
            'email.unique' => 'O email inserido já foi cadastrado',

            'password.required' => 'A senha é obrigatória',
            'password.string' => 'A senha deve ser um texto',
            'password.min' => 'A senha deve ter mais de 6 caracteres',

            'confirmPassword.required' => 'A confirmação de senha é obrigatória',
            'confirmPassword.string' => 'O confirmação de senha deve ser um texto',
            'confirmPassword.min' => 'O confirmação de senha deve ter mais de 6 caracteres',
            'confirmPassword.same' => 'A confirmação de senha deve ser igual à senha'

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
