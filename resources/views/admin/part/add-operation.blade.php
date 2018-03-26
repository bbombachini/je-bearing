@extends('layouts.admin-app')

@section('content')
<section id="content">
  <div class="section-head">
      <div class="section-title">
        <h1>Add Operations</h1>
      </div>
  </div>

  <div class="progress-bar-con">
      <ul class="progress-bar">
        <li id="progress-one">Part Details</li>
        <li id="progress-two" class="active" >Operations</li>
        <li id="progress-three">Quality Alerts</li>
      </ul>

      <hr id="progress-line">
  </div>


    <div class="formHeader">
      <h3>OPERATION</h3>
    </div>

    <div class="operInfo">
      {!! Form::open(['class' => 'operForm', 'files' => true]) !!}
       <fieldset class="alert-name">
        <p>{!! Form::label('opername', 'Name') !!}</p>
        {!! Form::text('name', '', ['required' => 'required', 'class' => 'form-control']) !!}
        </fieldset>

        <fieldset class="add-media">
          <p>{!! Form::label('media', 'Add Image') !!}</p>
          {!! Form::file('media', ['class' => 'form-control']) !!}
        </fieldset>

        <div id="buttonCon">
          <a href="{{ url('/admin/part/list')}}" class="white-button" name="button">SAVE AND FINISH</a>
          <a href="{{ url('/admin/part/add-step')}}" class="white-button" id="continueButt" name="button">SAVE AND CONTINUE</a>
        </div>
      {!! Form::close() !!}
    </div>


</section>
@endsection
