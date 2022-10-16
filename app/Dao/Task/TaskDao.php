<?php
namespace App\Dao\Task;

use App\Contracts\Dao\Task\TaskDaoInterface;
use App\Models\Task;

class TaskDao implements TaskDaoInterface
{
    public function getTaskList()
    {
        $tasks = Task::orderBy('created_at', 'asc')->get();
 
        return $tasks;
    }
    public function saveTask($validated)
    {
        $task = new Task();
        $task->name = $validated->name;
        $task->save();
     
        return $task;
    }
    public function deleteTask($task)
    {
        $task->delete();
        return "delete successfully";
    }
}