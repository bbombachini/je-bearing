@extends('layouts.login-app')

@section('admin-login')
  <div id="adminLoginCon">
    <div id="homeIcon">
      <a href="{{ url('/home')}}"><img src="/images/home.svg" alt="Home Icon" ></a>
    </div>
  </div>
@endsection

@section('message')
<div id="welcome-user-text">
  <div>
     <h1>Choose a Part</h1>
     <h3>Search for a part number to get started.</h3>
  </div>
</div>
@endsection

@section('login')
<div id="logout">
  <img src="/images/white-arrow.png" alt="left arrow" id="leftarrow">


  <ul class="dropdown-menu">
      <li>
          <a href="{{ route('logout') }}"><p>LOGOUT</p>
          </a>

          <!-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form> -->
      </li>
  </ul>
</div>
@endsection

@section('content')
  <section id="content-con">
          <h1>Part Number:</h1>
          <input type="text" name="partnumber" id="searchPart" class="form-input" placeholder="enter part #" value="">
          <div id="result"></div>
          <a id="nextPart"  href="{{ url('/oper/part/steps/') }}">
          <button type="submit" class="green-button" name="button">Next<img src="/images/white-arrow.png" id="right-arrow" alt="right arrow"></button></a>
  </section>

@endsection
