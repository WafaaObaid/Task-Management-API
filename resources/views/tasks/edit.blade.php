<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-9">

            <!-- Card -->
            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4 p-md-5">

                    <!-- Header -->
                    <div class="mb-4">
                        <h2 class="fw-bold mb-1">Edit Task</h2>
                        <p class="text-muted mb-0">
                            Update your task details
                        </p>
                    </div>

                    <form action="{{ route('tasks.update', $task->id) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <!-- Task Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label fw-semibold">
                                Task Title
                            </label>

                            <input
                                type="text"
                                id="title"
                                name="title"
                                class="form-control"
                                value="{{ old('title', $task->title) }}"
                                placeholder="Enter task title"
                            >

                            @error('title')
                                <div class="text-danger small mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label fw-semibold">
                                Description
                            </label>

                            <textarea
                                id="description"
                                name="description"
                                class="form-control"
                                rows="4"
                                placeholder="Enter task description"
                            >{{ old('description', $task->description) }}</textarea>

                            @error('description')
                                <div class="text-danger small mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label for="status" class="form-label fw-semibold">
                                Status
                            </label>

                            <select
                                id="status"
                                name="status"
                                class="form-select"
                            >
                                <option
                                    value="pending"
                                    @selected(old('status', $task->status) === 'pending')
                                >
                                    Pending
                                </option>

                                <option
                                    value="in_progress"
                                    @selected(old('status', $task->status) === 'in_progress')
                                >
                                    In Progress
                                </option>

                                <option
                                    value="completed"
                                    @selected(old('status', $task->status) === 'completed')
                                >
                                    Completed
                                </option>
                            </select>

                            @error('status')
                                <div class="text-danger small mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Due Date -->
                        <div class="mb-4">
                            <label for="due_date" class="form-label fw-semibold">
                                Due Date
                            </label>

                            <input
                                type="date"
                                id="due_date"
                                name="due_date"
                                class="form-control"
                                value="{{ old('due_date', $task->due_date) }}"
                            >

                            @error('due_date')
                                <div class="text-danger small mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex gap-2">

                            <button
                                type="submit"
                                class="btn btn-dark px-4"
                            >
                                Update Task
                            </button>

                            <a
                                href="{{ route('tasks.index') }}"
                                class="btn btn-outline-secondary px-4"
                            >
                                Cancel
                            </a>

                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

</body>
</html>
