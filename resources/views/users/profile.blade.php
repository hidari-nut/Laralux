@extends('layouts.frontend')
@section('content')
    <!-- Profile Edit Start -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="bg-white shadow p-4 rounded">
                    <h4 class="mb-4 text-center">Edit <span class="text-primary">Profile</span></h4>
                    <form>
                        <div class="row g-3">
                            <div class="col-md-12 text-center">
                                <img src="https://picsum.photos/200" class="rounded-circle" alt="Profile Picture">
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="firstName" placeholder="First Name">
                                    <label for="firstName">First Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="lastName" placeholder="Last Name">
                                    <label for="lastName">Last Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Email">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="username" placeholder="Username">
                                    <label for="username">Username</label>
                                </div>
                            </div>
                            <div class="col-md-6">
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
                            <div class="col-md-6">
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
                            <div class="col-md-12">
                                <label for="profile_image" class="form-label">Profile Picture</label>
                                <input type="file" id="profile_image" name="profile_image" class="form-control">
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Profile Edit End -->
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
