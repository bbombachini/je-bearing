@extends('layouts.login-app')

@section('message')
<div>
   <h1>Choose a Part</h1>
   <h3>Search for a part number to get started.</h3>
</div>
@endsection

@section('login')
<div id="logout">
  <img src="../../../images/white-arrow.png" alt="left arrow" id="leftarrow">

  <!-- TEMPORARY LOGOUT -->
  <ul class="dropdown-menu">
      <li>
          <a href="{{ route('login') }}"
              onclick="event.preventDefault();
          document.getElementById('logout-form').submit();"><p>LOGOUT</p>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
      </li>
  </ul>
</div>
@endsection

@section('content')
  <section id="content-con">
    <div class="content-form">
      <form class="searchpart" action="" method="get">
        <h1>Part Number:</h1>
        <input type="text" name="partnumber" class="form-input" placeholder="enter part #">
      </form>

      <a href="{{url('admin/tooling/list')}}"><button type="button" class="green-button" name="button">Next<img src="../../../images/white-arrow.png" id="right-arrow" alt="right arrow"></button></a> 
    </div>
  </section>

@endsection
