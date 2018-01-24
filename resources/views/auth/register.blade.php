@extends('layouts.login-app')

@section('message')
    <h1>Register</h1>
    <h3>Create and account to get started.</h3>
@endsection

@section('login')
    <div id="logout">
        <img src="../../../images/white-arrow.png" alt="left arrow" id="leftarrow">
        <a href="{{ route('login') }}"><p>LOGIN</p></a>
    </div>
@endsection

@section('content')

<section id="content-con">
    <div id="content-form">

    <div>
        <img src="images/je-bearing-logo-icon.png" alt="JE Bearing logo" id="loginLogo">
    </div>

        <form  method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <input class="formInput" id="name" type="text" placeholder="Name" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <p class="errorMsg">>{{ $errors->first('name') }}</p>
                        </span>
                    @endif
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                    <input class="formInput" id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <p class="errorMsg">{{ $errors->first('email') }}</p>
                        </span>
                    @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                    <input class="formInput" type="password" placeholder="Password" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <p class="errorMsg">{{ $errors->first('password') }}</p>
                        </span>
                    @endif
            </div>

            <div >
                <input class="formInput" id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required>
            </div>

            <div class="form-group">
                    <button type="submit" class="loginButt">
                        Register
                    </button>
            </div>
        </form>
    </div>
</section>
         
@endsection
