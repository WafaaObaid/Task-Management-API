<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Task</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4">

                    <h2 class="mb-4">Add New Task</h2>

                    <form action="{{ route('tasks.store') }}" method="POST">

                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Title</label>

                            <input
                                type="text"
                                name="title"
                                class="form-control"
                                value="{{ old('title') }}"
                                placeholder="Enter task title"
                            >

                            @error('title')
                                <div class="text-danger small mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Description</label>

                            <textarea
                                name="description"
                                class="form-control"
                                rows="4"
                                placeholder="Enter task description"
                            >{{ old('description') }}</textarea>

                            @error('description')
                                <div class="text-danger small mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Status</label>

                            <select name="status" class="form-select">

                                <option value="pending"
                                    @selected(old('status') === 'pending')>
                                    Pending
                                </option>

                                <option value="in_progress"
                                    @selected(old('status') === 'in_progress')>
                                    In Progress
                                </option>

                                <option value="completed"
                                    @selected(old('status') === 'completed')>
                                    Completed
                                </option>

                            </select>

                            @error('status')
                                <div class="text-danger small mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="mb-4">
                            <label class="form-label">Due Date</label>

                            <input
                                type="date"
                                name="due_date"
                                class="form-control"
                                value="{{ old('due_date') }}"
                            >

                            @error('due_date')
                                <div class="text-danger small mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="d-flex gap-2">

                            <button type="submit" class="btn btn-dark px-4">
                                Add Task
                            </button>

                            <a href="{{ route('tasks.index') }}"
                               class="btn btn-outline-secondary px-4">
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
