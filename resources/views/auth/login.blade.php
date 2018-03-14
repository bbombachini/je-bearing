@extends('layouts.login-app')


@section('message')
<div id="welcome-text">
    <h1>Welcome to your learning module</h1>
    <h3>Login to your account to get started.</h3>
</div>
@endsection

@section('login')
    <div id="logout">
        <!-- <img src="../../../images/white-arrow.png" alt="left arrow" id="leftarrow">
        <a href="{{ route('register') }}"><p>REGISTER</p></a> -->
    </div>
@endsection

@section('content')

<section id="content-con">

    <div id="content-form">

    <div>
        <img src="images/je-bearing-logo-icon.png" alt="JE Bearing logo" id="loginLogo">
    </div>

    <form method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">


            <input class="form-input" placeholder="Email" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
                <span class="help-block">
                    <p class="errorMsg">{{ $errors->first('email') }}<p>
                </span>
            @endif

        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

            <input class="form-input" placeholder="Password" id="password" type="password" name="password" required>

            @if ($errors->has('password'))
                <span class="help-block">
                    <p class="errorMsg">{{ $errors->first('password') }}</p>
                </span>
            @endif

           <!--  <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
            </label> -->

        </div>

        <div>

            <div>
                <button type="submit" class="loginButt">Login</button>
            </div>

            <div id="forgotPassCon">
                <a href="{{ route('password.request') }}" id="forgotPass"><p>
                Forgot Your Password?</p></a>
            </div>
        </div>

    </form>

    </div>
</section>

@endsection
