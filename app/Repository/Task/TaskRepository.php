<?php

namespace App\Repository\Task;


use App\Interface\Task\TaskInterface;
use App\Models\Task;


class TaskRepository implements TaskInterface
{
    protected $model;
    public function __construct(Task $model)
    {
        $this->model = $model;
    }
    public function index()
    {
        $tasks = $this->model->with('user')->paginate(10);

        return view('Website.Task.index', compact('tasks'));
    }

    public function show($id) {}
    public function edit($id)
    {
        $editTask = $this->model->findOrFail($id);
        return response()->json(['editTask' => $editTask]);
    }


    public function store(array $data)
    {
        $task = $this->model->create([
            'user_id' => auth()->guard('web')->id(),
            'title' => $data['title'],
            'description' => $data['description'],
            'status' => $data['status'] ?? 'pending'
        ]);
        if ($task) {
            return response()->json(['success' => true, 'task' => $task]);
        }
        return response()->json(['success' => false], 500);
    }

    public function update(array $data)
    {

        $id = $data['id'];
        $task = $this->model->findOrFail($id);
        $task->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'status' => $data['status'],
        ]);

        if ($task) {
            return response()->json(['success' => true, 'task' => $task]);
        }
        return response()->json(['success' => false], 500);
    }
    public function destroy($id) {
        $task = $this->model->findOrFail($id);
        $task->delete();
        return response()->json(['message' => 'Post deleted successfully'], 200);
    }
}
