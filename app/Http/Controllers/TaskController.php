<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware( 'task.permission' );
    }

    public function index()
    {
        $allTasks = [];
        for ( $i = 0; $i < 7; $i++ ) {
            $allTasks[] = auth()->user()->task()->where( 'day', $i )->orderBy( 'time' )->get();
        }

        return view( 'tasks.index', compact( 'allTasks' ) );
    }

    public function create()
    {
        return view( 'tasks.create' );
    }

    public function store( TaskRequest $request )
    {
        auth()->user()->task()->create( $request->all() );

        return redirect()->route( 'task.index' )->with( 'success', 'Created!' );
    }

    public function edit( Task $task )
    {
        return view( 'tasks.edit', compact( 'task' ) );
    }

    public function update( TaskRequest $request, Task $task )
    {
        $task->update( $request->all() );

        return redirect()->route( 'task.index' )->with( 'success', 'Updated!' );
    }

    public function destroy( Task $task )
    {
        $task->delete();

        return redirect()->route( 'task.index' )->with( 'delete', 'Deleted!' );
    }

    public function completed( Task $task )
    {
        $task->toggleCompleted();

        return redirect()->route( 'task.index' )->with( 'changed', 'Changed!' );
    }
}
