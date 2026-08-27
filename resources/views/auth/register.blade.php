<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">

    <style>
        :root{
            --bs-primary: #2F5FE0;
            --bs-primary-rgb: 47, 95, 224;
            --bs-secondary: #8A8781;
            --bs-secondary-rgb: 138, 135, 129;
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

            --teal:#14B8A6;
            --yellow:#FFD65C;
        }

        h1, h2, h3, h4, h5, h6{
            font-family: var(--bs-heading-font-family);
            letter-spacing: -0.01em;
        }

        body{
            background-image: radial-gradient(circle, rgba(0,0,0,0.06) 1px, transparent 1px);
            background-size: 22px 22px;
            overflow-x: hidden;
        }

        /* ---------- Brand (bigger, more visible) ---------- */
        .brand-mark{
            position: absolute;
            top: 28px;
            left: 36px;
            display: flex;
            align-items: center;
            gap: 12px;
            z-index: 5;
            opacity: 0;
            animation: dropIn .6s ease forwards;
        }

        .brand-mark .logo-mark{
            width: 42px;
            height: 42px;
            background: var(--bs-dark);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 10px 20px rgba(23,24,26,0.18);
        }

        .brand-mark .brand-text{
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 700;
            font-size: 24px;
            letter-spacing: -0.02em;
            color: var(--bs-dark);
        }

        /* ---------- Scene wrapper ---------- */
        .scene{
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 120px 24px 60px;
        }

        /* ---------- Decorative floaters (same family as landing hero) ---------- */
        .floater{
            position: absolute;
            filter: drop-shadow(0 14px 22px rgba(0,0,0,0.08));
            opacity: 0;
            animation: fadeIn .7s ease forwards, bob 6s ease-in-out infinite;
        }
        .floater:nth-of-type(1){ animation-delay: .15s, .85s; }
        .floater:nth-of-type(2){ animation-delay: .3s, 1s; }
        .floater:nth-of-type(3){ animation-delay: .45s, 1.15s; }
        .floater:nth-of-type(4){ animation-delay: .6s, 1.3s; }

        @keyframes fadeIn{
            from{ opacity:0; transform: translateY(14px) scale(.96); }
            to{ opacity:1; transform: translateY(0) scale(1); }
        }
        @keyframes bob{
            0%, 100%{ transform: translateY(0); }
            50%{ transform: translateY(-10px); }
        }
        @keyframes dropIn{
            from{ opacity:0; transform: translateY(-10px); }
            to{ opacity:1; transform: translateY(0); }
        }
        @keyframes cardIn{
            from{ opacity:0; transform: translateY(24px) scale(.98); }
            to{ opacity:1; transform: translateY(0) scale(1); }
        }
        @keyframes spin1{ from{ transform: rotate(0deg);} to{ transform: rotate(360deg);} }
        @keyframes spin2{ from{ transform: rotate(0deg);} to{ transform: rotate(360deg);} }

        .sticky-note{
            width: 168px;
            top: 12%;
            left: 7%;
            background: var(--yellow);
            border-radius: 6px;
            padding: 18px 16px;
            font-family: 'IBM Plex Mono', monospace;
            font-size: 11px;
            line-height: 1.65;
            color: #3B3300;
            transform: rotate(-7deg);
        }
        .sticky-pin{
            position: absolute;
            top: -8px; left: 50%;
            width: 13px; height: 13px;
            background: #E23D3D;
            border-radius: 50%;
            box-shadow: 0 3px 4px rgba(0,0,0,0.3);
        }

        .clock-floater{
            top: 68%;
            left: 9%;
            width: 70px; height: 70px;
            background: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 20px rgba(0,0,0,0.08);
        }
        .clock-hand{
            position: absolute;
            background: var(--bs-dark);
            border-radius: 2px;
            transform-origin: bottom center;
        }
        .h1hand{ width: 2.5px; height: 14px; top: 21px; left: 34px; animation: spin1 8s linear infinite; }
        .h2hand{ width: 2px; height: 20px; top: 15px; left: 34.5px; animation: spin2 30s linear infinite; }

        .reminder-card{
            top: 14%;
            right: 7%;
            width: 190px;
            background: #fff;
            border-radius: 14px;
            padding: 16px;
            transform: rotate(5deg);
        }
        .reminder-card .rc-title{
            font-family: 'Space Grotesk';
            font-weight: 700;
            font-size: 12.5px;
            margin-bottom: 8px;
            color: var(--bs-dark);
        }
        .rc-meeting{
            background: #F5F4F1;
            border-radius: 8px;
            padding: 9px;
        }
        .rc-meeting .name{ font-size: 10.5px; font-weight: 700; margin-bottom: 3px; }
        .rc-time{
            display: inline-block;
            margin-top: 5px;
            background: #DFF3F0;
            color: #0F8A79;
            font-family: 'IBM Plex Mono';
            font-size: 8.5px;
            padding: 3px 7px;
            border-radius: 6px;
        }

        .tasks-card{
            bottom: 10%;
            right: 8%;
            width: 210px;
            background: #fff;
            border-radius: 14px;
            padding: 16px;
            box-shadow: 0 14px 26px rgba(0,0,0,0.09);
        }
        .tasks-card .tc-title{
            font-family: 'Space Grotesk';
            font-weight: 700;
            font-size: 12.5px;
            margin-bottom: 10px;
        }
        .task-row{ margin-bottom: 12px; }
        .task-row:last-child{ margin-bottom: 0; }
        .task-tag{
            display: inline-block;
            width: 15px; height: 15px;
            border-radius: 4px;
            font-size: 8.5px;
            color: #fff;
            text-align: center;
            line-height: 15px;
            margin-right: 5px;
        }
        .tag-red{ background: #E4573D; }
        .tag-green{ background: #22A06B; }
        .task-name{ font-size: 10.5px; font-weight: 600; vertical-align: middle; }
        .bar-track{
            height: 5px;
            background: #EDEBE6;
            border-radius: 4px;
            overflow: hidden;
            margin-top: 6px;
        }
        .bar-fill{ height: 100%; border-radius: 4px; }
        .bar1{ width: 60%; background: var(--bs-primary); }
        .bar2{ width: 100%; background: #E4573D; }

        @media (max-width: 991px){
            .floater{ display: none; }
            .scene{ padding-top: 110px; }
        }

        /* ---------- Register card ---------- */
        .login-card{
            position: relative;
            z-index: 2;
            opacity: 0;
            animation: cardIn .6s ease .2s forwards;
        }

        .card{
            --bs-card-border-width: 0;
            --bs-card-border-radius: 1.25rem;
            --bs-card-box-shadow: 0 18px 40px rgba(0, 0, 0, 0.1);
            transition: transform .25s ease, box-shadow .25s ease;
        }

        .form-control{
            --bs-border-radius: 0.7rem;
            padding-top: 0.6rem;
            padding-bottom: 0.6rem;
            border-color: var(--bs-border-color);
            transition: border-color .2s ease, box-shadow .2s ease;
        }
        .form-control:focus{
            border-color: var(--bs-primary);
            box-shadow: 0 0 0 0.2rem rgba(var(--bs-primary-rgb), 0.15);
        }

        .form-label{
            font-weight: 600;
            font-size: 0.85rem;
        }

        .btn{
            --bs-btn-border-radius: var(--bs-border-radius-pill);
            --bs-btn-font-weight: 600;
            transition: transform .15s ease, background-color .15s ease;
        }
        .btn:active{ transform: scale(.98); }

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
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
            <path d="M3 15 C 3 8, 9 8, 9 15 S 15 22, 15 15 S 21 8, 21 15" stroke="#FFFFFF" stroke-width="2.6" stroke-linecap="round" fill="none"/>
            <circle cx="21" cy="15" r="2.4" fill="#14B8A6"/>
        </svg>
    </span>
    <span class="brand-text">TaskFlow</span>
</div>

<div class="scene">

    <!-- Decorative floaters, same family as the landing page hero -->
    <div class="floater sticky-note">
        <div class="sticky-pin"></div>
        Take notes to keep track of crucial details, and accomplish more with ease.
    </div>

    <div class="floater clock-floater">
        <div class="clock-hand h2hand"></div>
        <div class="clock-hand h1hand"></div>
    </div>

    <div class="floater reminder-card">
        <div class="rc-title">Reminders</div>
        <div class="rc-meeting">
            <div class="name">Today's Meeting</div>
            <div style="font-size:9px; color:var(--bs-secondary-color);">Call with marketing team</div>
            <span class="rc-time">1:00 – 1:45 PM</span>
        </div>
    </div>

    <div class="floater tasks-card">
        <div class="tc-title">Today's tasks</div>
        <div class="task-row">
            <span class="task-tag tag-red">B</span>
            <span class="task-name">New ideas for campaign</span>
            <div class="bar-track"><div class="bar-fill bar1"></div></div>
        </div>
        <div class="task-row">
            <span class="task-tag tag-green">D</span>
            <span class="task-name">Design PPT #4</span>
            <div class="bar-track"><div class="bar-fill bar2"></div></div>
        </div>
    </div>

    <div class="login-card">
        <div class="card border-0 shadow-sm rounded-4" style="max-width: 420px; width: 100%;">

            <div class="card-body p-5">

                <div class="text-center mb-4">
                    <h2 class="fw-bold">Create Account</h2>
                    <p class="text-muted">Start managing your tasks</p>
                </div>

                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{ old('name') }}"
                            placeholder="Enter your name"
                            required
                        >

                        @error('name')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email') }}"
                            placeholder="Enter your email"
                            required
                        >

                        @error('email')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Create a password"
                            required
                        >

                        @error('password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Confirm Password</label>
                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control"
                            placeholder="Confirm your password"
                            required
                        >
                    </div>

                    <button type="submit" class="btn btn-dark w-100 py-2">
                        Create Account
                    </button>
                </form>

                <p class="text-center text-muted mt-4 mb-0">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-dark fw-semibold">
                        Login
                    </a>
                </p>

            </div>
        </div>
    </div>

</div>

</body>
</html>
