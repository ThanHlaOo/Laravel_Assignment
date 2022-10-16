<?php
namespace App\Contracts\Services\Task;

use App\Http\Requests\PostCreateRequest;
use App\Models\Task;

interface TaskServiceInterface 
{
    public function getTaskList();
    public function saveTask(PostCreateRequest $validated);
    public function deleteTask(Task $task);
}