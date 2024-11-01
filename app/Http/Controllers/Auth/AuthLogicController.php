<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Interface\Auth\AuthLogicInterface;
use Illuminate\Http\Request;

class AuthLogicController extends Controller
{
    protected $repository;
    public function __construct(AuthLogicInterface $repository){
        $this->repository = $repository;
    }

    final public function register(RegisterRequest $request){
        return $this->repository->register($request->validated());
    }

    final public function login(LoginRequest $request){
        return $this->repository->login($request->validated());
    }

    final public function logout(){
        return $this->repository->logout();
    }

}
