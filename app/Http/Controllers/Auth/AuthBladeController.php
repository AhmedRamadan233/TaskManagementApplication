<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Interface\Auth\AuthBladeInterface;
use App\Interface\Auth\AuthLogicInterface;
use Illuminate\Http\Request;

class AuthBladeController extends Controller
{
    protected $repository;
    public function __construct(AuthBladeInterface $repository){
        $this->repository = $repository;
    }

    final public function register(){
        return $this->repository->registerIndex();
    }

    final public function login(){
        return $this->repository->loginIndex();
    }



}
