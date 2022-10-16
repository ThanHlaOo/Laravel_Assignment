<?php 
namespace App\Contracts\Dao\Task;

interface TaskDaoInterface 
{
    public function getTaskList();
    public function saveTask($validated);
    public function deleteTask($task);
}
