@extends('layouts.admin-app')

@section('content')
<section id="content">
  <div class="section-head">
      <div class="section-title">
        <h1>Add Operations</h1>
      </div>
  </div>

  <div id="operations">

    <div class="formHeader">
      <h3>OPERATIONS</h3>
    </div>

    <div class="operInfo">
      {!! Form::open(['class' => 'operForm', 'files' => true]) !!}
       <fieldset class="alert-name">
        <p>{!! Form::label('opername', 'Name') !!}</p>
        {!! Form::text('name', '', ['required' => 'required', 'class' => 'form-control']) !!}
        </fieldset>


        <fieldset class="add-media">
        <p>{!! Form::label('media', 'Media') !!}</p>
        {!! Form::file('media', ['class' => 'form-control']) !!}
        </fieldset>

        <button type="submit" class="white-button" name="button">SAVE AND FINISH</button>
        <button type="submit" class="white-button" name="button">SAVE AND CONTINUE</button>
      {!! Form::close() !!}
    </div>
  </div>

    <!-- <div id="stepForm" class="subForm">

      <div class="subFormHeader">
        <h3>STEP</h3>
        <p>Delete</p>
      </div>

        {!! Form::open(['id' => 'addStep', 'files' => true]) !!}


        <fieldset class="alert-name">
        <p>{!! Form::label('stepname', 'Name') !!}</p>
        {!! Form::text('name', '', ['required' => 'required', 'class' => 'form-control']) !!}
        </fieldset>


        <fieldset class="add-media">
        <p>{!! Form::label('media', 'Media') !!}</p>
        {!! Form::file('media', ['class' => 'form-control']) !!}
        </fieldset>

        <fieldset class="add-desc">
        <p>{!! Form::label('desc', 'Description') !!}</p>
        {!! Form::textarea('desc', '', ['class' => 'form-add', 'size' => '50x5']) !!}
        </fieldset>

        <fieldset class="add-instruct">
        <p>{!! Form::label('special-instructions', 'Special Instructions') !!}</p>
        {!! Form::textarea('instruct', '', ['class' => 'form-add', 'size' => '50x5']) !!}
        </fieldset>

        <button type="submit" class="green-button" name="button">SAVE</button>
        {!! Form::close() !!}
    </div>
    <p class="addSubForm">Add Another Step</p> -->


</section>
@endsection
