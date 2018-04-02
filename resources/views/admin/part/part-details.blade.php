@extends('layouts.admin-app')

@section('content')
<section id="content">
  <div class="section-head">
      <div class="section-title">
        <h1>Add a Part</h1>
      </div>
  </div>

  <div class="progress-bar-con">
            <ul class="progress-bar">
              <li id="progress-one">Part Details</li>
              <li class="active" id="progress-two">Operations</li>
              <li id="progress-three">Quality Alerts</li>
            </ul>

            <hr id="progress-line">
  </div>

  <div class="formHeader">
      <h3>PART DETAILS</h3>
  </div>

  <div id="operations">

    <div class="partName">
      <h4>Part Name:</h4>
      <h4>Number:</h4>
    </div>

    <div>
      <ul>
        <li class="formHeader"><h3>OPERATION ONE</h3></li>
        <li class="formHeader"><h3>OPERATION TWO</h3></li>
      </ul>
    </div>

    <div class="addItem">
      <a href="{{ url('/admin/part/add/operation')}}">+ Add Another Operation</a>
    </div>

    <div id="buttonCon">
        <a href="{{ url('/admin/part/list')}}" class="white-button" name="button">SAVE AND FINISH</a>
        <a href="{{ url('/admin/part/add-alert')}}" class="white-button" id="continueButt" name="button">SAVE AND CONTINUE</a>
    </div>

  </div>


</section>
@endsection
