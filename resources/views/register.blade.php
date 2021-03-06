@extends('master')

@section('content')
    <div class="container-fluid" id="login-back">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Sign In</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <span><i class="fab fa-google-plus-square"></i></span>
                        <span><i class="fab fa-twitter-square"></i></span>
                    </div>
                </div>
                <div class="card-body">
                    <form action="register" method="POST">
                        {{ csrf_field() }}
                        <div class="input-group form-group {{$errors->has('name') ? 'has-error': ''}}">
                            <div class="input-group-prepend">
                                <span class="input-group-text pl-5"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="name" placeholder="Full Name">
                        </div>
                        <div class="input-group form-group {{$errors->has('email') ? 'has-error': ''}}">
                            <div class="input-group-prepend">
                                <span class="input-group-text pl-5"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="text" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="input-group form-group {{$errors->has('password') ? 'has-error': ''}}">
                            <div class="input-group-prepend">
                                <span class="input-group-text pl-5 "><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="form-group my-4">
                            <input type="submit" value="Sign Up" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        Already have an account?<a href="/login">Log In</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="#">Forgot your password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

