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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">

    <!--
        Theme is applied by overriding Bootstrap's own CSS variables
        (the documented way to theme Bootstrap 5.3) rather than
        writing one-off overriding rules per component.
    -->
    <style>
        :root{
            /* Brand colors mapped onto Bootstrap's theme variables */
            --bs-primary: #2F5FE0;
            --bs-primary-rgb: 47, 95, 224;
            --bs-secondary: #8A8781;
            --bs-secondary-rgb: 138, 135, 129;
            --bs-success: #14B8A6;
            --bs-success-rgb: 20, 184, 166;
            --bs-info: #2F5FE0;
            --bs-info-rgb: 47, 95, 224;
            --bs-warning: #FFD65C;
            --bs-warning-rgb: 255, 214, 92;
            --bs-danger: #E4573D;
            --bs-danger-rgb: 228, 87, 61;
            --bs-dark: #17181A;
            --bs-dark-rgb: 23, 24, 26;

            /* Page canvas + surfaces */
            --bs-body-bg: #EFEDE8;
            --bs-body-color: #17181A;
            --bs-border-color: #DAD7CF;
            --bs-secondary-color: #8A8781;

            /* Typography */
            --bs-body-font-family: 'Inter', sans-serif;
            --bs-heading-font-family: 'Space Grotesk', sans-serif;

            /* Shape */
            --bs-border-radius: 0.9rem;
            --bs-border-radius-lg: 1.1rem;
            --bs-border-radius-sm: 0.6rem;
            --bs-border-radius-pill: 50rem;

            --teal: #14B8A6;
        }

        h1, h2, h3, h4, h5, h6{
            font-family: var(--bs-heading-font-family);
            letter-spacing: -0.01em;
        }

        body{
            background-image: radial-gradient(circle, rgba(0,0,0,0.06) 1px, transparent 1px);
            background-size: 22px 22px;
        }

        /* ---------- Brand: glowing wordmark ---------- */
        .brand-mark{
            position: absolute;
            top: 20px;
            left: 24px;
            display: flex;
            align-items: center;
            gap: 7px;
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 700;
            font-size: 14px;
            letter-spacing: -0.01em;
            color: var(--bs-dark);
        }

        .brand-mark .logo-mark{
            width: 22px;
            height: 22px;
            background: var(--bs-dark);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            animation: logoPulse 3.2s ease-in-out infinite;
        }

        .brand-mark .brand-text{
            animation: textGlow 3.2s ease-in-out infinite;
        }

        @keyframes logoPulse{
            0%, 100%{ box-shadow: 0 0 0 0 rgba(20, 184, 166, 0.0); }
            50%{ box-shadow: 0 0 0 6px rgba(20, 184, 166, 0.18); }
        }
        @keyframes textGlow{
            0%, 100%{ text-shadow: 0 0 0 rgba(47, 95, 224, 0); }
            50%{ text-shadow: 0 0 10px rgba(47, 95, 224, 0.35), 0 0 18px rgba(20, 184, 166, 0.18); }
        }

        /* ---------- Entrance animations ---------- */
        @keyframes riseIn{
            from{ opacity: 0; transform: translateY(16px); }
            to{ opacity: 1; transform: translateY(0); }
        }
        @keyframes popIn{
            from{ opacity: 0; transform: translateY(10px) scale(.97); }
            to{ opacity: 1; transform: translateY(0) scale(1); }
        }

        .welcome-block{
            opacity: 0;
            animation: riseIn .5s ease forwards;
        }

        .page-header{
            opacity: 0;
            animation: riseIn .5s ease .08s forwards;
        }

        .stat-card{
            opacity: 0;
            animation: popIn .5s ease forwards;
            transition: transform .2s ease, box-shadow .2s ease;
        }
        .stat-card:nth-of-type(1){ animation-delay: .12s; }
        .stat-card:nth-of-type(2){ animation-delay: .2s; }
        .stat-card:nth-of-type(3){ animation-delay: .28s; }
        .stat-card:nth-of-type(4){ animation-delay: .36s; }
        .stat-card:hover{
            transform: translateY(-4px);
            box-shadow: 0 14px 26px rgba(0,0,0,0.08) !important;
        }

        .stat-icon{
            width: 40px;
            height: 40px;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
        }

        .stat-number{
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 700;
            font-size: 26px;
            line-height: 1;
        }

        .table-wrap{
            opacity: 0;
            animation: riseIn .5s ease .44s forwards;
        }

        tbody tr{
            animation: riseIn .4s ease forwards;
            opacity: 0;
        }
        tbody tr:nth-of-type(1){ animation-delay: .5s; }
        tbody tr:nth-of-type(2){ animation-delay: .56s; }
        tbody tr:nth-of-type(3){ animation-delay: .62s; }
        tbody tr:nth-of-type(4){ animation-delay: .68s; }
        tbody tr:nth-of-type(5){ animation-delay: .74s; }
        tbody tr:nth-of-type(n+6){ animation-delay: .78s; }

        .table-hover tbody tr{
            transition: background-color .15s ease, transform .15s ease;
        }
        .table-hover tbody tr:hover{
            transform: translateX(2px);
        }

        /* Component-level Bootstrap variables */
        .btn{
            --bs-btn-border-radius: var(--bs-border-radius-pill);
            --bs-btn-font-weight: 600;
            font-family: 'Inter', sans-serif;
            transition: transform .15s ease;
        }
        .btn:active{ transform: scale(.97); }

        .btn-dark{
            --bs-btn-bg: var(--bs-dark);
            --bs-btn-border-color: var(--bs-dark);
            --bs-btn-hover-bg: #1F3F9E;
            --bs-btn-hover-border-color: #1F3F9E;
        }

        .badge{
            --bs-badge-font-weight: 600;
            font-family: 'Inter', sans-serif;
        }

        .card{
            --bs-card-border-width: 0;
            --bs-card-border-radius: 1.1rem;
            --bs-card-box-shadow: 0 10px 24px rgba(0, 0, 0, 0.06);
        }

        .table{
            --bs-table-hover-bg: #F7F6F3;
        }

        .table thead.table-light th{
            font-family: 'IBM Plex Mono', monospace;
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            color: var(--bs-secondary-color);
            font-weight: 500;
        }

        .modal-content{
            --bs-modal-border-radius: 1.25rem;
            box-shadow: 0 18px 40px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>

<body class="bg-body">

<!-- Brand -->
<div class="brand-mark">
    <span class="logo-mark">
        <svg width="11" height="11" viewBox="0 0 24 24" fill="none">
            <path d="M3 15 C 3 8, 9 8, 9 15 S 15 22, 15 15 S 21 8, 21 15" stroke="#FFFFFF" stroke-width="2.6" stroke-linecap="round" fill="none"/>
            <circle cx="21" cy="15" r="2.4" fill="#14B8A6"/>
        </svg>
    </span>
    <span class="brand-text">TaskFlow</span>
</div>

<div class="container py-5">

    <!-- Welcome Message -->
    <div class="text-center mb-5 welcome-block">

        <h4 class="fw-semibold text-dark mb-1">
            Hello, {{ auth()->user()->name }}! 👋
        </h4>

        <p class="text-muted mb-0">
            Have a nice day!
        </p>

    </div>


    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 page-header">

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


    <!-- Quick Stats -->
    <div class="row g-3 mb-4">

        <div class="col-6 col-lg-3 stat-card">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body d-flex align-items-center gap-3 p-3">
                    <div class="stat-icon" style="background:#E4ECFD;">📋</div>
                    <div>
                        <div class="stat-number">{{ $tasks->count() }}</div>
                        <div class="text-muted" style="font-size:12px;">Total tasks</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3 stat-card">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body d-flex align-items-center gap-3 p-3">
                    <div class="stat-icon" style="background:#DFF3F0;">✅</div>
                    <div>
                        <div class="stat-number">{{ $tasks->where('status', 'completed')->count() }}</div>
                        <div class="text-muted" style="font-size:12px;">Completed</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3 stat-card">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body d-flex align-items-center gap-3 p-3">
                    <div class="stat-icon" style="background:#E4ECFD;">⏳</div>
                    <div>
                        <div class="stat-number">{{ $tasks->where('status', 'in_progress')->count() }}</div>
                        <div class="text-muted" style="font-size:12px;">In progress</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3 stat-card">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body d-flex align-items-center gap-3 p-3">
                    <div class="stat-icon" style="background:#FFF3D2;">🕓</div>
                    <div>
                        <div class="stat-number">{{ $tasks->whereNotIn('status', ['completed', 'in_progress'])->count() }}</div>
                        <div class="text-muted" style="font-size:12px;">Pending</div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Active Tasks -->
    <div class="card border-0 shadow-sm rounded-4 table-wrap">

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
