
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

    <!-- Welcome Message -->
    <div class="text-center mb-5">

        <h4 class="fw-semibold text-dark mb-1">
            Hello, {{ auth()->user()->name }}! 👋
        </h4>

        <p class="text-muted mb-0">
            Have a nice day!
        </p>

    </div>


    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-semibold text-dark mb-1">
                Task Management
            </h2>

            <p class="text-muted mb-0">
                Manage your tasks easily
            </p>

        </div>


        <a
            href="{{ route('tasks.create') }}"
            class="btn btn-dark px-4"
        >
            + Add Task
        </a>

    </div>


    <!-- Active Tasks -->
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
                            <th class="text-center">Actions</th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse ($tasks as $task)

                            <tr>

                                <!-- Title -->
                                <td class="fw-semibold">
                                    {{ $task->title }}
                                </td>


                                <!-- Description -->
                                <td class="text-muted">
                                    {{ $task->description ?? 'No description' }}
                                </td>


                                <!-- Status -->
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


                                <!-- Due Date -->
                                <td>
                                    {{ $task->due_date ?? 'No date' }}
                                </td>


                                <!-- Actions -->
                                <td class="text-center">

                                    <!-- Edit -->
                                    <a
                                        href="{{ route('tasks.edit', $task->id) }}"
                                        class="btn btn-sm btn-outline-secondary me-1"
                                    >
                                        Edit
                                    </a>


                                    <!-- Delete -->
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-outline-danger"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteModal"
                                        data-task-id="{{ $task->id }}"
                                        data-task-title="{{ $task->title }}"
                                    >
                                        Delete
                                    </button>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="5"
                                    class="text-center text-muted py-4"
                                >
                                    No tasks found.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>


    <!-- Restore Deleted Tasks Button -->
    <div class="text-center mt-4">

        <a
            href="{{ route('tasks.deleted') }}"
            class="btn btn-outline-secondary px-4"
        >
            Restore Deleted Tasks
        </a>

    </div>

</div>


<!-- Delete Confirmation Modal -->
<div
    class="modal fade"
    id="deleteModal"
    tabindex="-1"
    aria-labelledby="deleteModalLabel"
    aria-hidden="true"
>

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content border-0 shadow rounded-4">

            <!-- Modal Header -->
            <div class="modal-header border-0">

                <h5
                    class="modal-title fw-semibold"
                    id="deleteModalLabel"
                >
                    Delete Task
                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>

            </div>


            <!-- Modal Body -->
            <div class="modal-body text-center px-4">

                <div class="mb-3">

                    <span
                        class="d-inline-flex align-items-center justify-content-center
                               bg-danger-subtle text-danger rounded-circle"
                        style="width: 55px; height: 55px;"
                    >
                        🗑️
                    </span>

                </div>


                <h6 class="fw-semibold">
                    Are you sure?
                </h6>


                <p class="text-muted mb-2">

                    Do you want to delete
                    <strong id="taskTitle"></strong>?

                </p>


                <p class="text-muted small mb-0">

                    You can restore it later from Deleted Tasks.

                </p>

            </div>


            <!-- Modal Footer -->
            <div class="modal-footer border-0 justify-content-center pb-4">

                <button
                    type="button"
                    class="btn btn-outline-secondary px-4"
                    data-bs-dismiss="modal"
                >
                    Cancel
                </button>


                <form
                    id="deleteForm"
                    method="POST"
                    class="d-inline"
                >

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="btn btn-danger px-4"
                    >
                        Delete
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>


<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<!-- Delete Modal JavaScript -->
<script>

    const deleteModal = document.getElementById('deleteModal');

    deleteModal.addEventListener('show.bs.modal', function (event) {

        const button = event.relatedTarget;

        const taskId = button.getAttribute('data-task-id');

        const taskTitle = button.getAttribute('data-task-title');


        // Show task title inside the modal
        document.getElementById('taskTitle').textContent = taskTitle;


        // Set delete form action
        document.getElementById('deleteForm').action =
            `/tasks/${taskId}`;

    });

</script>


</body>
</html>

