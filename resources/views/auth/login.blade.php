@extends('guest')

@section('content')

<div class="card p-4 shadow-sm">
    <h4 class="mb-3 text-center">Login</h4>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input class="form-control" name="email" type="email" required autofocus>
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input class="form-control" name="password" type="password" required>
        </div>

        <!-- Remember Me -->
        <div class="mb-3 form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember">
            <label class="form-check-label" for="remember">Remember me</label>
        </div>

        <button class="btn btn-primary w-100">Log in</button>
    </form>
</div>

@endsection
