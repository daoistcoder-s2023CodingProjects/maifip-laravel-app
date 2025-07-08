@extends('layouts.app')
@section('content')
<div class="admin-login-wrapper" style="min-height:100vh;display:flex;align-items:center;justify-content:center;background:#f8f9fa;">
    <div class="application-form-card" style="max-width:400px;width:100%;margin:auto;">
        <div class="text-center mb-4">
            <img src="/images/maifip_logo.png" alt="MAIFIP Logo" style="height:60px;width:60px;">
            <h3 class="mt-2" style="color:#186737;font-weight:500;letter-spacing:0.08em;">Admin Login</h3>
        </div>
        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="username" required autofocus>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            @if($errors->any())
                <div class="alert alert-danger small">{{ $errors->first() }}</div>
            @endif
            <button type="submit" class="btn btn-success w-100 mt-2">Login</button>
        </form>
    </div>
</div>
@endsection
<style>
.admin-login-wrapper .application-form-card {
    box-shadow: 0 4px 24px 0 rgba(24, 103, 55, 0.08);
    border-radius: 16px;
    padding: 2.5rem 2rem 2rem 2rem;
    background: #fff;
}
</style>
