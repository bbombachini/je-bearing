@extends('layouts.login-app')

@section('message')
<div id="reset-text">
    <h1>Reset Password</h1>
    <h3>Fill out the following fields to reset your password</h3>

</div>
@endsection

@section('content')


<section id="content-con">

    <div id="content-form">

    <div>
        <img src="../../images/je-bearing-logo-icon.png" alt="JE Bearing logo" id="loginLogo">
    </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                <input id="email" type="email" class="form-input" name="email" value="{{ $email or old('email') }}" placeholder="Email" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                          
                                <input id="password" type="password" class="form-input" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            
                                <input id="password-confirm" type="password" class="form-input" name="password_confirmation" placeholder="Confirm Password" required>


                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                        </div>

                         <div>
                            <button type="submit" class="loginButt">Reset and Login</button>
                        </div>

                        <div id="forgotPassCon">
                            <a href="{{ route('home') }}" id="forgotPass"><p>Login with old Password</p></a>
                        </div>
                    </form>
                </div>
    </div>
</section>
@endsection
