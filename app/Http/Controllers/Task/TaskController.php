<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\TaskRequest;
use App\Interface\Task\TaskInterface;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $repository;
    public function __construct(TaskInterface $repository)
    {

        $this->repository = $repository;
    }

    final public function index()
    {
        return $this->repository->index();
    }

    final public function store(TaskRequest $request)
    {
        return $this->repository->store($request->validated());
    }

    final public function edit($id)
    {
        return $this->repository->edit($id);
    }
    final public function update(TaskRequest $request)
    {
        return $this->repository->update($request->validated());
    }
    final public function destroy($id)
    {
        return $this->repository->destroy($id);
    }
}
