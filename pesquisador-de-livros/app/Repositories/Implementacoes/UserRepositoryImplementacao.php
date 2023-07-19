<?php

namespace App\Repositories\Implementacoes;

use App\Models\User;
use App\Dto\UserDto;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepositoryImplementacao implements UserRepositoryInterface{

    /**
     *
     * Esse método será responsável por pegar todos os Usuários do banco de dados, armazená-los em dto e mandar para o service.
     *
     */
    public function allUsers()
    {
        $users = User::all();

        $listaUserDto = [];

        foreach($users as $user){

            $userDto = new UserDto($user->id, $user->name, $user->email, $user->password);
            array_push($listaUserDto, $userDto);

        }

        return $listaUserDto;

    }

    /**
     * Cria um usuário
     */
    public function createUser(UserDto $userDto)
    {

        $user = User::create([

            'name' => $userDto->getName(),
            'email' => $userDto->getEmail(),
            'password' => $userDto->getPassword()

        ]);

        return $user;

    }
    /**
     * Retorna o userDto se encontrar algum registro de usuário para o id informado, ou retorna null
     */
    public function findUserById($id)
    {
        $user = User::find($id);

        $userDto = null;

        if ($user != null) {
            $userDto = new UserDto($user->id, $user->name, $user->email, $user->password);
        }

        return $userDto;
    }

    /**
     * Atualiza um usuário usando a classe UserDto
     */
    public function updateUser(UserDto $userDto)
    {

        $user = new User();
        $user->id = $userDto->getId();
        $user->email = $userDto->getEmail();
        $user->password = $userDto->getPassword();
        $user->name = $userDto->getName();

        return 'Usuário atualizado!';


    }

    /**
     * Deleta um usuário
     */
    public function deleteUser($id)
    {

        User::where('id', $id)->delete();
    }


}
