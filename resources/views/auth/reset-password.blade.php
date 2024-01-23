@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
<div class="authentication-reset-password d-flex align-items-center justify-content-center">
    <div class="row">
        <div class="col-12 col-lg-10 mx-auto">
            <div class="card">
                <div class="row g-0">
                    <div class="col-lg-5 border-end">
                        <div class="card-body">
                            <div class="p-5">
                                <div class="text-start">
                                    <img src="{{ asset('asset') }}/images/logo-img.png" width="180" alt="">
                                </div>
                                <h4 class="mt-5 font-weight-bold">Genrate New Password</h4>
                                <p class="text-muted">We received your reset password request. Please enter your new password!</p>
                                <form method="POST" action="{{ route('password.store') }}">
                                    @csrf
                                    <!-- Password Reset Token -->
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                    <!-- Email Address -->
                                    <input type="hidden" name="email" value="{{ $request->email }}">

                                    <div class="mb-3 mt-5">
                                        <label class="form-label">New Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Enter new password" />
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" name="password_confirmation" placeholder="Enter confirm password" />
                                        @error('password_confirmation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">Reset Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <img src="{{ asset('asset') }}/images/login-images/forgot-password-frent-img.jpg" class="card-img login-img h-100" alt="...">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
