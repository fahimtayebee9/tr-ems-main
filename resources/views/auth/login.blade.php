@extends('layouts.cauth')

@section('content')
    @php
        $str = "12345678";
        echo Hash::make($str);
    @endphp
    <div class="account-box">
        <div class="account-wrapper">
            <h3 class="account-title">
                Login <br>
                <strong>Tech Rajshahi EMS</strong>
            </h3>
            <p class="account-subtitle">Access to our dashboard</p>

            

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group first">
                    <label for="username">Username</label>
                    <input id="text" type="text" class="form-control @error('username') is-invalid @enderror"
                        name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label>Password</label>
                        </div>
                        <div class="col-auto">
                            @if (Route::has('password.request'))
                                <a class="text-muted" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="position-relative">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password">
                        <span class="fa fa-eye-slash" id="toggle-password" style="position: absolute; top: 50%; right: 3%; transform: translate(0%, -50%);"></span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="d-flex mb-5 align-items-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary account-btn">
                    {{ __('Login') }}
                </button>
            </form>
        </div>
    </div>
@endsection
            
