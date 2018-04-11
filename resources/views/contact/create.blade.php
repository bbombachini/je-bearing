@extends('layouts.opp-app')

@section('content')

    <section id="content">
    <div class="section-head">

            <div class="section-title">
                <h2 id="bigTitle">Contact Supervisor</h2>
                <h5 id="subTitle">Contact a supervisor to get approval to move forward.</h5>
            </div>
    </div>

    @foreach ($supers as $super)
        <p>{{ $super->fname }} {{ $super->lname }} </p>
    @endforeach

    <div id="contactFormCon">
        @if(Session::has('message'))
            <div class="alert alert-sucess">{{Session::get('message')}}</div>
        @endif

        {!! Form::open(['route' => 'contact.store']) !!}

        <fieldset class="contactLabel" id="contactName">
        <p>{!! Form::label('name', 'Supervisors Name') !!}</p>
        {!! Form::text('name', null, ['class' => 'contactInput']) !!}
        </fieldset>

        <fieldset class="contactLabel" id="contactEmail">
        <p>{!! Form::label('email', 'E-mail') !!}</p>
        {!! Form::text('email', null, ['class' => 'contactInput']) !!}
        </fieldset>

        <fieldset class="contactLabel" id="contactSubject">
        <p>{!! Form::label('subject', 'Subject') !!}</p>
        {!! Form::select('subject', array('Please come and see me at my machine'=>'Please come and see me at my machine', 'Quality Question'=>'Quality Question', 'Machine Problem'=>'Machine Problem', 'Need Material'=>'Need Material', 'Recommendation'=>'Recommendation')); !!}
        </fieldset>

        <fieldset class="contactLabel">
        <p>{!! Form::label('message') !!}</p>
        {!! Form::textarea('msg', null, ['class' => 'contactInput']) !!}
        </fieldset> 

        <button type="submit" class="green-button" name="button">SUBMIT</button>

        {!! Form::close() !!}

    </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


  
</section>


@endsection
