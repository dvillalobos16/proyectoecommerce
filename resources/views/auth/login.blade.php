@extends('layouts.app')

@section('content')
<div class="register-login-container out">
<div class="register-login-container inner">
        <form action="{{ route('login') }}" method="POST" class="register-login-form">
                @csrf
            <h1 class="register-login-title">Sign in</h1>
            <div class="row">
                <p class="input-name">Email</p>
                <div class="inner-row">
                    <input type="email" class="form-control text-input @error('email') is-invalid @enderror" name="email" placeholder="example@email.com">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <i class="remixicon-checkbox-circle-fill"></i>
                    <i class="remixicon-close-circle-fill"></i>
                </div>
            </div>
            <div class="row">
                <p class="input-name">Password</p>
                <div class="inner-row">
                    <input type="password" class="form-control text-input @error('password') is-invalid @enderror" name="password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <i class="remixicon-checkbox-circle-fill"></i>
                    <i class="remixicon-close-circle-fill"></i>
                </div>
            </div>
            <div class="row">
                <button type="submit" class="btn_registro">Sign in</button>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="link-form">Forgot password?</a>
                @endif
            </div>
        </form>
</div>
</div>
@endsection
