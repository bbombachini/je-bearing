@extends('layouts.opp-app')

@section('content')

    <section id="content">
    <div class="section-head">

            <div class="section-title">
                <h2 id="bigTitle">Contact Supervisor</h2>
                <h5 id="subTitle">Contact a supervisor to get approval to move forward.</h5>
            </div>
    </div>

    <div id="contactFormCon">

    	<form id="contactForm">

        @if(Session::has('message'))
            <div class="alert alert-sucess">{{Session::get('message')}}</div>
        @endif
              <fieldset class="contactLabel" id="contactName">
              	<p>{!! Form::label('Supervisor Name') !!}</p>
              	{!! Form::text('number', '', ['class' => 'contactInput']) !!}
              </fieldset>

              <fieldset class="contactLabel" id="contactEmail">
              	<p>{!! Form::label('Supervisor Email') !!}</p>
              	{!! Form::text('number', '', ['class' => 'contactInput']) !!}
              </fieldset>

              <fieldset class="contactLabel" id="contactSubject">
              	<p>{!! Form::label('Subject') !!}</p>
              	{!! Form::text('number', '', ['class' => 'contactInput']) !!}
              </fieldset>

              <fieldset class="contactLabel">
              	<p>{!! Form::label('message') !!}</p>
              	{!! Form::textarea('desc', '', ['class' => 'contactInputMessage', 'size' => '50x10']) !!}

            </fieldset>

            <button type="submit" class="green-button" name="button">SUBMIT</button>
    	</form>

    	
    </div>


    


</section>


@endsection
