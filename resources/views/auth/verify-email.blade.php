@extends('layouts.auth')

@section('title', 'Verify Email')

@section('content')
<div class="d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
            <div class="col mx-auto">
                <div class="my-4 text-center">
                    <img src="{{ asset('asset') }}/images/logo-img.png" width="180" alt="" />
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="p-4 rounded">
                            <div class="text-center">
                                <h4 class="mt-5 font-weight-bold">Verification Email</h4>
                                <p class="text-success">Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.</p>
                            </div>
                            <div class="form-body">

                                @if (session('status') == 'verification-link-sent')
                                <div class="alert alert-info">
                                    <strong>A new verification link has been sent to the email address you provided during registration.</strong>
                                </div>
                                @endif
                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary btn-lg">Resend Verification Email</button>
                                    </div>
                                </form>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-danger btn-lg mt-3">
                                            <i class='bx bx-arrow-back me-1'></i> Log Out
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
