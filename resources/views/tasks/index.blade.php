<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
</head>
<body>
    <h1>To-Do List</h1>

    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <table>
            <tr>
                <td>Task Name:</td>
                <td><input type="text" name="name" required></td>
            </tr>
            <tr>
                <td>Description:</td>
                <td><textarea name="description"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Add Task</button></td>
            </tr>
        </table>
    </form>

    <h2>Tasks</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>#</th>
                <th>Task</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->description ?? '-' }}</td>
                    <td>{{ ucfirst($task->status ?? 'pending') }}</td>
                    <td>
                        <form method="POST" action="{{ route('tasks.destroy', $task->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No tasks found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>

