<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Deleted Tasks</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

<div class="container py-5">

    <!-- Header -->
    <div class="text-center mb-5">

        <h2 class="fw-semibold text-dark mb-1">
            Deleted Tasks
        </h2>

        <p class="text-muted mb-0">
            Restore your deleted tasks
        </p>

    </div>


    <!-- Success Message -->
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"
            ></button>
        </div>

    @endif


    <!-- Back Button -->
    <div class="mb-4">

        <a
            href="{{ route('tasks.index') }}"
            class="btn btn-outline-secondary"
        >
            ← Back to Tasks
        </a>

    </div>


    <!-- Deleted Tasks Table -->
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Due Date</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($deletedTasks as $task)

                            <tr>

                                <td class="fw-semibold">
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

                                <td class="text-center">

                                    <form
                                        action="{{ route('tasks.restore', $task->id) }}"
                                        method="POST"
                                        class="d-inline"
                                    >

                                        @csrf
                                        @method('PATCH')

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-outline-success"
                                        >
                                            Restore
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td
                                    colspan="5"
                                    class="text-center text-muted py-5"
                                >
                                    No deleted tasks found.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
