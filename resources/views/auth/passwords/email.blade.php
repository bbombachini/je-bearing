@extends('layouts.login-app')

@section('message')
<div id="reset-text">
    <h1>Reset Password</h1>
    <h3>Enter your email to recieve a reset link.</h3>
</div>
@endsection

@section('content')
<section id="content-con">

    <div id="content-form">

    <div>
        <img src="../images/je-bearing-logo-icon.png" alt="JE Bearing logo" id="loginLogo">
    </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                           
                        <input id="email" type="email" class="form-input" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                           
                        </div>

                        <div>
                            <button type="submit" class="loginButt">Submit</button>
                        </div>

                        <div id="forgotPassCon">
                            <a href="{{ route('home') }}" id="forgotPass"><p>Login</p></a>
                        </div>

                    </form>
                </div>
     </div>       
</section>
@endsection
