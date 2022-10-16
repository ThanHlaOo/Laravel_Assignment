<!-- resources/views/tasks.blade.php -->
 
@extends('layouts.app')
 
@section('content')
 
    <!-- Bootstrap Boilerplate... -->
 
    <div class="container">
        <!-- Display Validation Errors -->
        @include('common.errors')
 
        <!-- New Task Form -->
        <form action="{{ url('task') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
 
            <!-- Task Name -->
            <div class="mb-3">
                <label for="task" class="col-sm-3 control-label h2">Task</label>
 
                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>
 
            <!-- Add Task Button -->
            <div class="mb-3">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                         Add Task
                    </button>
                </div>
            </div>
        </form>
            <!-- Current Tasks -->
    @if (count($tasks) > 0)
    <div class="card">
        <div class="card-title h3">
            Current Tasks
        </div>

        <div class="card-body">
            <table class="table">

                <!-- Table Headings -->
                <thead>
                    <th>Task</th>
                    <th>&nbsp;</th>
                </thead>

                <!-- Table Body -->
                <tbody>
                    @foreach ($tasks as $task)
                        <tr class="d-flex justify-content-between">
                            <!-- Task Name -->
                            <td >
                                <div>{{ $task->name }}</div>
                            </td>

                            <td>
                                <form action="{{ url('task/'.$task->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                         
                                    <button type="submit" class="btn btn-outline-danger">
                                         Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
    </div>
 
    <!-- TODO: Current Tasks -->
@endsection