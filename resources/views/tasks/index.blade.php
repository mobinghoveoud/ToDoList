<style type="text/css" scoped>
    .scrollspy-example {
        position: relative;
        height: 300px;
        margin-top: .5rem;
        overflow: auto;
    }
</style>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Task</div>

                    <div class="card-body">

                        <div class="d-flex justify-content-start">
                            <a class="btn btn-primary btn-lg" href="{{ route('task.create') }}">New task</a>
                        </div>

                        <br>

                        @if(session('changed'))
                            <div class="alert alert-info">{{ session('changed') }}</div>
                        @endif

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if(session('delete'))
                            <div class="alert alert-danger">{{ session('delete') }}</div>
                        @endif

                        @php($days = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'])

                        <nav id="navbar-example2" class="navbar navbar-light bg-light">
                            <ul class="nav nav-pills">
                                @foreach($allTasks as $i => $tasks)
                                    @if (!$tasks->isEmpty())
                                        <li class="nav-item"><a class="nav-link"
                                                                href="#{{ $days[$i] }}">{{ $days[$i] }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </nav>

                        <div data-spy="scroll" data-target="#navbar-example2" data-offset="0" class="scrollspy-example">
                            @foreach($allTasks as $i => $tasks)
                                @if ($tasks->isEmpty())
                                    @continue
                                @endif

                                <h2 id="{{ $days[$i] }}">{{ $days[$i] }}</h2>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Detail</th>
                                        <th>Day</th>
                                        <th>Time</th>
                                        <th>Completed</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tasks as $i => $task)
                                        <tr class="@if($i % 2 == 0) table-active @endif">
                                            <th>{{ $task->id }}</th>
                                            <td>{{ $task->title }}</td>
                                            <td>{{ $task->detail }}</td>
                                            <td>{{ $task->day }}</td>
                                            <td>{{ $task->time }}</td>

                                            <td>
                                                <a class="btn {{ $task->completed ? "btn-outline-success" : "btn-outline-danger" }}"
                                                   href="{{ route('task.completed',compact('task')) }}">
                                                    {{ $task->completed ? "Yes" : "No" }}
                                                </a>
                                            </td>

                                            <td>
                                                <a class="btn btn-secondary"
                                                   href="{{ route('task.edit',compact('task')) }}">
                                                    Edit
                                                </a>
                                            </td>

                                            <td>
                                                <form action="{{ route('task.destroy',compact('task')) }}"
                                                      method="POST">
                                                    <input class="btn btn-dark" type="submit" value="Delete"/>

                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <br>
                                <hr class="border-top my-3 w-50"><br>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
