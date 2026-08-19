<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Task Management</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-semibold text-dark mb-1">Task Management</h2>
            <p class="text-muted mb-0">Manage your tasks easily</p>
        </div>

       <a href="{{ route('tasks.create') }}" class="btn btn-dark px-4">
    + Add Task
</a>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                   <thead class="table-light">
                         <tr>
                         <th class="px-4">ID</th>
                         <th>Title</th>
                        <th>Description</th>
                         <th>Status</th>
                         <th>Due Date</th>
                            <th>Created At</th>
                        <th class="text-center">Actions</th>
                         </tr>
                            </thead>

                    <tbody>

    @forelse ($tasks as $task)

        <tr>
            <td class="px-4">
                {{ $task->id }}
            </td>

            <td>
                {{ $task->title }}
            </td>

            <td class="text-muted">
                {{ $task->description ?? 'No description' }}
            </td>

            <td>
                @if ($task->status === 'completed')
                    <span class="badge bg-success-subtle text-success-emphasis rounded-pill px-3">
                        Completed
                    </span>
                @elseif ($task->status === 'in_progress')
                    <span class="badge bg-info-subtle text-info-emphasis rounded-pill px-3">
                        In Progress
                    </span>
                @else
                    <span class="badge bg-warning-subtle text-warning-emphasis rounded-pill px-3">
                        Pending
                    </span>
                @endif
            </td>

            <td>
                {{ $task->due_date ?? 'No date' }}
            </td>

            <td>
                {{ $task->created_at->format('M d, Y') }}
            </td>

            <td class="text-center">

                <a href="{{ route('tasks.edit', $task->id) }}"
                   class="btn btn-sm btn-outline-secondary me-1">
                    Edit
                </a>

                <form class="d-inline"
                      action="{{ route('tasks.destroy', $task->id) }}"
                      method="POST">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            onclick="return confirm('Are you sure you want to delete this task?')"
                            class="btn btn-sm btn-outline-danger">
                             Delete
                    </button>

                </form>

            </td>
        </tr>

    @empty

        <tr>
            <td colspan="7" class="text-center text-muted py-4">
                No tasks found.
            </td>
        </tr>

    @endforelse

</tbody>

                </table>
            </div>

        </div>
    </div>

</div>

</body>
</html>
