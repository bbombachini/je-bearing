@extends('layouts.opp-app')

@section('content')

    <section id="content">
    <div class="section-head">

            <div class="section-title">
                <h2 id="bigTitle">Contact Me</h2>
                <h5 id="subTitle">Contact a supervisor to get approval to move forward.</h5>
            </div>
    </div>

    <div id="contactFormCon">
        
        <h2>hi</h2>
        {!! Form::open(['route' => 'oper.store']) !!}

        <div class="form-group">
        {!! Form::label('name', 'Your Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
        {!! Form::label('email', 'E-mail Address') !!}
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
        {!! Form::textarea('msg', null, ['class' => 'form-control']) !!}
        </div>

        {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

        {!! Form::close() !!}

    </div>


  
</section>


@endsection
