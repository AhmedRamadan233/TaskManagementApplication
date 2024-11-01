<?php

namespace App\Repository\Home;

use App\Interface\Auth\AuthLogicInterface;
use App\Interface\Home\HomeInterface;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeRepository implements HomeInterface
{

    protected $taskModel;
    protected $userModel;


    public function __construct(Task $taskModel , User $userModel)
    {
        $this->taskModel = $taskModel;
        $this->userModel = $userModel;
    }
    public function index()
    {
        $userId = Auth::id();
        $tasksCount = $this->taskModel->count();
        $myTasksCount = $this->taskModel
            ->where('user_id', $userId)
            ->count();
        $usersCount = $this->userModel->count();
        return view('Website.Home.index', compact('tasksCount', 'usersCount', 'myTasksCount'));
    }

}
