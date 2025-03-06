<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
</head>
<body>
    <h1>Edit Task</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Title:</label>
        <input type="text" name="title" value="{{ $task->title }}" required>

        <label>Description:</label>
        <textarea name="description">{{ $task->description }}</textarea>

        <button type="submit">Update Task</button>
    </form>

    <a href="{{ route('tasks.index') }}">Back to Task List</a>
</body>
</html>
