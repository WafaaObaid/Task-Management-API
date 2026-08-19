
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">


<div class="container min-vh-100 d-flex align-items-center justify-content-center">

    <div class="card border-0 shadow-sm rounded-4" style="max-width: 420px; width: 100%;">

        <div class="card-body p-5">

            <div class="text-center mb-4">
                <h2 class="fw-bold">Welcome Back !</h2>
                <p class="text-muted">Login to manage your tasks</p>
            </div>

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email') }}"
                        placeholder="Enter your email"
                        required>

                    @error('email')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label">Password</label>
                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Enter your password"
                        required
                    >

                    @error('password')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-dark w-100 py-2">
                    Login
                </button>
            </form>

            <p class="text-center text-muted mt-4 mb-0">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-dark fw-semibold">
                    Register
                </a>
            </p>

        </div>
    </div>

</div>

</body>
</html>

