<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Interface\Home\HomeInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $repository;
    public function __construct(HomeInterface $repository){
        $this->repository = $repository;
    }

    final public function index()
    {
        return $this->repository->index();

    }
}
