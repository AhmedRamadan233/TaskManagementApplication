<?php

namespace App\Interface\Task;

interface TaskInterface
{
    public function index();
    public function show($id);
    public function edit($id);
    public function store(array $data);
    public function update(array $data);
    public function destroy($id);
}
