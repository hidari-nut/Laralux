@extends('layouts.frontendlogin')
@section('contentlogin')
    <!-- Register Start -->
    <div class="container register mt-5 wow fadeIn">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="text-center mb-4">
                        <h3 class="text-primary">REGISTER</h3>
                    </div>
                    <form method="POST" enctype="multipart/form-data" action="#">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" name="name"
                                class="form-control @error('name') is-invalid @enderror" required autocomplete="name"
                                autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" id="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" required
                                    autocomplete="new-password">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="password-confirm" class="form-label">Re-enter Password</label>
                            <div class="input-group">
                                <input type="password" id="password-confirm" name="password_confirmation"
                                    class="form-control" required autocomplete="new-password">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary" id="togglePasswordConfirm">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="file_image" class="form-label">Upload Image</label>
                            <input type="file" id="file_image" name="file_image"
                                class="form-control @error('file_image') is-invalid @enderror">
                            @error('file_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary w-100 py-3">
                                {{ __('Register') }}
                            </button>
                        </div>
                        <div class="form-group text-center mt-3">
                            <a class="btn btn-link" href="#">
                                {{ __('Already have an account? Login here') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Register End -->
@endsection
@section('javascript')
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const password = document.getElementById('password');
            const icon = this.querySelector('i');
            if (password.type === 'password') {
                password.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        document.getElementById('togglePasswordConfirm').addEventListener('click', function() {
            const passwordConfirm = document.getElementById('password-confirm');
            const icon = this.querySelector('i');
            if (passwordConfirm.type === 'password') {
                passwordConfirm.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordConfirm.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>
@endsection
