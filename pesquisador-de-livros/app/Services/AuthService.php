<?php

namespace App\Services;

use App\Dto\UserDto;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\AuthServiceInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AuthService implements AuthServiceInterface{

    private $userRepositoryImplementacao;


    public function __construct(UserRepositoryInterface $userRepository){

        //Injeta o repositório
        $this->userRepositoryImplementacao = $userRepository;

    }

    /**
     * Executa o login, validando os parâmetros, formando o token e retornando para o controller, em caso de sucesso
     * @param string $email,
     * @param string $password
     *
     * @return string
     */
    public function login (Request $request)
    {


        //Pega o email e senha e armazena em um array chave e valor
        $credenciais = $request->only('email', 'password');

        //Tentativa de login
        $token = Auth::attempt($credenciais);

        if ($token) {

            //Coloca o token na sessão
            session()->put('token', $token);

        }

        return $token;

    }

    /**
     *Registra efetivamente o usuário e salva no banco de dados a partir da classe repository
     *
     * @param string $name
     * @param string $email
     * @param string $password
     *
     * @return
     *
     */
    public function register (Request $request)
    {

        $userDto = new UserDto(null, $request->name, $request->email, $request->password);

        $user = $this->userRepositoryImplementacao->createUser($userDto);

        $token = Auth::login($user);

        //Coloca o token na sessão
        session()->put('token', $token);

        return $token;


    }

    /**
     * Desloga o usuário invalidando o token
     */
    public function logout ()
    {
        try{
            Auth::logout();
        } catch (Exception $e) {

        }


        session()->pull('token');

    }

    /**
     *atualiza o token do usuário logado
     *
     *@return array
     */
    public function refresh ()
    {

        $user = Auth::user();

        $token = Auth::refresh();

        return ['token' => $token, 'user' => $user];



    }

}
