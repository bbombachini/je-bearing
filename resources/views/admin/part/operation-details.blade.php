@extends('layouts.admin-app')

@section('content')
<section id="content">
  <div class="section-head">
      <div class="section-title">
        <h1>Add a Part</h1>
      </div>
  </div>

@include('partials.progressbar')

  <div class="formHeader">
      <h3>OPERATION DETAILS</h3>
  </div>

  <div id="operations">

    <div class="partName">
      <h4>Operation Name:</h4>
    </div>

    <div>
      <ul>
        <li class="formHeader"><h3>STEP ONE</h3></li>
        <li class="formHeader"><h3>STEP TWO</h3></li>
      </ul>
    </div>

    <div class="addItem">
      <a href="{{ url('/admin/part/add-step')}}">+ Add Another Step</a>
    </div>

    <div id="buttonCon">
        <a href="{{ url('/admin/part/list')}}" class="white-button" name="button">SAVE AND FINISH</a>
        <a href="{{ url('/admin/part/part-details')}}" class="white-button" id="continueButt" name="button">SAVE AND CONTINUE</a>
    </div>
  </div>


</section>
@endsection
