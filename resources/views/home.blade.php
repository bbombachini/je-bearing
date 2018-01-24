@extends('layouts.login-app')

@section('message')
<div>
   <h1>Welcome, {{ Auth::user()->name }}</h1>
   <h3>Choose where you would like to go.</h3>
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
                       document.getElementById('logout-form').submit();">
            <p>LOGOUT</p>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
      </li>
  </ul>
</div>
@endsection

@section('content')

<section id="dashboard">
  <div class="dash-section">
    <div class="dash-icon">
      <img src="../../../images/workicon.svg" alt="Work Instructions">
    </div>
    <div class="dash-text">
      <a href="#"><h3>Work Instructions</h3></a>
    </div>
  </div>

  <a href="admin/tooling/list" class="dash-section">
      <div class="dash-icon">
        <img src="../../../images/repairIcon.svg" alt="Repair and Overhaul">
      </div>

      <div class="dash-text">
        <h3>Repair and Overhaul</h3>
      </div>
  </a>

  <div class="dash-section">
    <div class="dash-icon">
      <img src="../../../images/newsIcon.svg" alt="J/E News">
    </div>
    <div class="dash-text">
      <a href="#"><h3>J/E News</h3></a>
    </div>
  </div>

  <div class="dash-section">
    <div class="dash-icon">
      <img src="../../../images/humanIcon.svg" alt="Human Resources">
    </div>
    <div class="dash-text">
      <a href="#"><h3>Human Resources</h3></a>
    </div>
  </div>

  <div class="dash-section">
    <div class="dash-icon">
      <img src="../../../images/freepointIcon.svg" alt="Freepoint">
    </div>
    <div class="dash-text">
      <a href="#"><h3>Freepoint</h3></a>
    </div>
  </div>

</section>

@endsection
