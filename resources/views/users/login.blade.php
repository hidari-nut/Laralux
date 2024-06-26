@extends('layouts.frontendlogin')
@section('contentlogin')
    <!-- Login Start -->
    <div class="container login mt-5 wow fadeIn">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="text-center mb-4">
                        <h3 class="text-primary">LOG IN</h3>
                    </div>
                    <form method="POST" action="#">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" required autocomplete="email"
                                autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" required
                                autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            {{-- <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div> --}}
                        </div>
                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary w-100 py-3">
                                {{ __('Login') }}
                            </button>
                        </div>
                        <div class="form-group text-center mt-3">
                            <a class="btn btn-link" href="#">
                                {{ __('New user? Register here') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Login End -->
@endsection
@section('javascript')
@endsection
