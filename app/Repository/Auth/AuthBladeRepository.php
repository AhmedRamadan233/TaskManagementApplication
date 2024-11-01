<?php

namespace App\Repository\Auth;

use App\Interface\Auth\AuthBladeInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthBladeRepository implements AuthBladeInterface
{
    public function registerIndex()
    {
        return view('Website.Auth.register');
    }
    public function loginIndex ()
    {
        return view('Website.Auth.login');

    }

}
