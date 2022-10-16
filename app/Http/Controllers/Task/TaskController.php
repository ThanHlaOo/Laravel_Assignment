<?php

namespace App\Http\Controllers\Task;

use App\Contracts\Services\Task\TaskServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use App\Models\Task;

class TaskController extends Controller
{
   
    private $taskInterface;
    public function __construct(TaskServiceInterface $taskInterface)
    {
        $this->taskInterface = $taskInterface;
    }
    public function index(){
        $task = $this->taskInterface->getTaskList();
        return view('tasks', ['tasks' => $task]);
    }
    public function create(PostCreateRequest $request){
        $task = $this->taskInterface->saveTask($request);
        return redirect('/');
    }
    public function delete(Task $task){
        $task = $this->taskInterface->deleteTask($task);
        return redirect('/');
    }

}
