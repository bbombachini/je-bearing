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
      <h3>OPERATIONS - PART #{{$partNumber}}: {{$partName}}</h3>
    </div>

    <div class="operInfo">
      {!! Form::open(['class' => 'addOper', 'files' => true]) !!}
       <fieldset class="add-name">
        <p>{!! Form::label('name', 'Name') !!}</p>
        {!! Form::text('name', '', ['required' => 'required', 'class' => 'form-control']) !!}
        </fieldset>


        <fieldset class="add-media">
        <p>{!! Form::label('media', 'Media') !!}</p>
        {!! Form::file('media', ['class' => 'form-control']) !!}
        </fieldset>

        <button type="submit" class="white-button oper-next" name="finish">SAVE AND FINISH</button>
        <button type="submit" class="white-button oper-next" name="continue">SAVE AND CONTINUE</button>
      {!! Form::close() !!}
    </div>
  </div>

</section>
@endsection
