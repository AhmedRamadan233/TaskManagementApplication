<?php

namespace App\Interface\Auth;

interface AuthLogicInterface
{
    public function register(array $data);

    public function login (array  $data);
    public function logout();

}
