<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
</head>
<body>
    <h1>All Tasks</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('tasks.create') }}">Create New Task</a>

    @foreach ($tasks as $task)
        <div>
            <h2>{{ $task->title }}</h2>
            <p>{{ $task->description }}</p>
            <a href="{{ route('tasks.show', $task->id) }}">View</a> | 
            <a href="{{ route('tasks.edit', $task->id) }}">Edit</a> | 
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    @endforeach
</body>
</html>
