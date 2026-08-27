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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">

    <!--
        Theme is applied by overriding Bootstrap's own CSS variables
        (the documented way to theme Bootstrap 5.3) rather than
        writing one-off overriding rules per component.
    -->
    <style>
        :root{
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

            --bs-body-bg: #EFEDE8;
            --bs-body-color: #17181A;
            --bs-border-color: #DAD7CF;
            --bs-secondary-color: #8A8781;

            --bs-body-font-family: 'Inter', sans-serif;
            --bs-heading-font-family: 'Space Grotesk', sans-serif;

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

        /* ---------- Brand: glowing wordmark, same as the rest of the app ---------- */
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

        @keyframes riseIn{
            from{ opacity: 0; transform: translateY(16px); }
            to{ opacity: 1; transform: translateY(0); }
        }

        .container > .text-center,
        .container > .mb-4{
            opacity: 0;
            animation: riseIn .5s ease forwards;
        }
        .container > .mb-4{ animation-delay: .08s; }

        .card{
            --bs-card-border-width: 0;
            --bs-card-border-radius: 1.1rem;
            --bs-card-box-shadow: 0 10px 24px rgba(0, 0, 0, 0.06);
            opacity: 0;
            animation: riseIn .5s ease .16s forwards;
        }

        .badge{
            --bs-badge-font-weight: 600;
            font-family: 'Inter', sans-serif;
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

        .table-hover tbody tr{
            transition: background-color .15s ease, transform .15s ease;
        }
        .table-hover tbody tr:hover{
            transform: translateX(2px);
        }

        .btn{
            --bs-btn-border-radius: var(--bs-border-radius-pill);
            --bs-btn-font-weight: 600;
            font-family: 'Inter', sans-serif;
            transition: transform .15s ease;
        }
        .btn:active{ transform: scale(.97); }

        .alert-success{
            --bs-alert-bg: #DFF3F0;
            --bs-alert-border-color: #BFE9E2;
            --bs-alert-color: #0F8A79;
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
