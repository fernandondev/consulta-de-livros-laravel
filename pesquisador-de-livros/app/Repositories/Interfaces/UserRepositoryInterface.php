<?php

namespace App\Repositories\Interfaces;

use App\Dto\UserDto;

interface UserRepositoryInterface {

    public function allUsers();
    public function createUser(UserDto $userDto);
    public function findUserById($id);
    public function updateUser(UserDto $userDto);
    public function deleteUser($id);

}
