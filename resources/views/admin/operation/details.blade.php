@extends('layouts.admin-app')

@section('content')
<section id="content">
  <div class="section-head">
      <div class="section-title">
        <h1>Add a Part</h1>
      </div>
  </div>

  <div id="operations">
    <h4>Operation Details</h4>

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
      <a href="{{ url('/admin/part/add/operations')}}">+ Add Another Operation</a>
    </div>

    <button type="submit" class="white-button" name="button">SAVE AND FINISH</button>
    <button type="submit" class="white-button" name="button">SAVE AND CONTINUE</button>
  </div>


</section>
@endsection
