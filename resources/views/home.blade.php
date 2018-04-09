@extends('layouts.login-app')

@section('admin-login')
  <div id="adminLoginCon">
    <a href="{{url('admin/tooling/list')}}">
      <div id="adminLogin">
        <img src="/images/user-icon.png" alt="user ucon" id="userIcon">
        <p>Admin</p>
      </div>
    </a>
  </div>
@endsection


@section('message')
<div id="welcome-user-text">
<div>
   <h1>Welcome, {{ Auth::user()->fname }} {{ Auth::user()->lname }}</h1>
   <h3>Choose where you would like to go.</h3>
</div>
</div>
@endsection

@section('login')
<div id="logout">
  <img src="/images/white-arrow.png" alt="left arrow" id="leftarrow">

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


  <a href="oper/tooling" class="dash-section">
    <div class="dash-icon">
      <img src="/images/repairIcon.svg" alt="Work Instructions">
    </div>

    <div class="dash-text">
        <h3>Work Instructions</h3>
    </div>
  </a>

  <a href="oper/tooling" class="dash-section">
    <div class="dash-icon">
      <img src="/images/assembly.svg" alt="Assembly">
    </div>

    <div class="dash-text">
        <h3>Assembly</h3>
    </div>
  </a>

  <a href="oper/tooling" class="dash-section">
      <div class="dash-icon">
        <img src="/images/workIcon.svg" alt="Repair and Overhaul">
      </div>

      <div class="dash-text">
        <h3>Repair and Overhaul</h3>
      </div>
  </a>

<a href="#" class="dash-section">
    <div class="dash-icon">
      <img src="/images/newsIcon.svg" alt="J/E News">
    </div>
    <div class="dash-text">
      <h3>J/E News</h3>
  </div>
</a>

<a href="#" class="dash-section">
    <div class="dash-icon">
      <img src="/images/humanIcon.svg" alt="Human Resources">
    </div>
    <div class="dash-text">
      <h3>Human Resources</h3>
    </div>
</a>

<a href="#" class="dash-section">
    <div class="dash-icon">
      <img src="/images/freepointIcon.svg" alt="Freepoint">
    </div>
    <div class="dash-text">
      <h3>Freepoint</h3>
    </div>
  </div>
</a>

</section>

@endsection
