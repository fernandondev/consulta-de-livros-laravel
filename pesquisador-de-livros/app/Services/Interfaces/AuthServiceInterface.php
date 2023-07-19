<?php

namespace App\Services\Interfaces;

use Illuminate\Http\Request;


interface AuthServiceInterface{

    public function login(Request $request);
    public function register (Request $request);
    public function logout ();
    public function refresh ();


}
