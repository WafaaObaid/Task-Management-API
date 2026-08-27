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

        /* ---------- Brand: glowing wordmark, same as the dashboard ---------- */
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

        .container > .row{
            opacity: 0;
            animation: riseIn .5s ease .1s forwards;
        }

        .card{
            --bs-card-border-width: 0;
            --bs-card-border-radius: 1.1rem;
            --bs-card-box-shadow: 0 10px 24px rgba(0, 0, 0, 0.06);
        }

        .form-control, .form-select{
            --bs-border-radius: 0.7rem;
            padding-top: 0.6rem;
            padding-bottom: 0.6rem;
            border-color: var(--bs-border-color);
            transition: border-color .2s ease, box-shadow .2s ease;
        }
        .form-control:focus, .form-select:focus{
            border-color: var(--bs-primary);
            box-shadow: 0 0 0 0.2rem rgba(var(--bs-primary-rgb), 0.15);
        }

        .form-label{
            font-size: 0.85rem;
        }

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
