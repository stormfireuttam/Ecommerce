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
                    <form action="login" method="POST">
                        {{ csrf_field() }}
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="email" placeholder="Email">
{{--                            @if($errors->has('email'))--}}
{{--                                <span class="alert alert-danger" style="color: red"></span>--}}
{{--                            @endif--}}
                        </div>
{{--                        <span style="color: red">--}}
{{--                            {{$errors->first('email', ':message')}}--}}
{{--                        </span>--}}
                        <div class="input-group form-group {{$errors->has('password') ? 'has-error': ''}}">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" name="password" placeholder="Password">
{{--                            @if($errors->has('password'))--}}
{{--                                <span class="alert alert-danger" style="color: red">{{$errors->first('password')}}</span>--}}
{{--                            @endif--}}
                        </div>
{{--                        <span style="color: red">--}}
{{--                            {{$errors->first('password', ':message')}}--}}
{{--                        </span>--}}
{{--                        @if($errors->any())--}}
{{--                            <ul class="alert alert-danger">--}}
{{--                                @foreach ($errors->all() as $error)--}}
{{--                                    <li >{{ $error }}</li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        @endif--}}
                        <div class="form-group my-4">
                            <input type="submit" value="Login" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        Don't have an account?<a href="/register">Sign Up</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="#">Forgot your password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

