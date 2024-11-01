<?php

namespace App\Repository\Auth;

use App\Interface\Auth\AuthLogicInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthLogicRepository implements AuthLogicInterface
{
    protected $model;
    public function __construct(User $model){
        $this->model = $model;
    }

    public function register(array $data)
    {
        $user = $this->model->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);
        return redirect()->route('login');
    }

    public function login (array  $data)
    {
        $user = User::where('email', $data['email'])->first();

        if (Auth::attempt($data)) {
            Auth::login($user);
            return redirect()->route('home');
        } else {
            return redirect()->back()->withErrors(['login' => 'Invalid credentials.']);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
