<?php
namespace App\Services\Task;

use App\Contracts\Dao\Task\TaskDaoInterface;
use App\Contracts\Services\Task\TaskServiceInterface;
use App\Http\Requests\PostCreateRequest;
use App\Models\Task;

class TaskService implements TaskServiceInterface
{
    private $taskDao;
    public function __construct(TaskDaoInterface $taskDao)
    {
        $this->taskDao = $taskDao;
    }

    
    public function getTaskList()
    {
        return $this->taskDao->getTaskList();
    }
    public function saveTask(PostCreateRequest $validated)
    {
        return $this->taskDao->saveTask($validated);
    }
    public function deleteTask(Task $task)
    {
        return $this->taskDao->deleteTask($task);
    }
}