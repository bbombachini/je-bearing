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

        <h3 id="successMsg">
        @if(Session::has('message'))
            <div class="alert alert-sucess">{{Session::get('message')}}</div>
        @endif
        </h3>

        {!! Form::open(['route' => 'contact.store']) !!}

        <fieldset class="contactLabel" id="contactName">
            <p>{!! Form::label('name', 'Supervisors Name') !!}</p>
        
            <select class="form-control" name="name">
            @foreach($supers as $super)
            <option value="{{ $super->id }}">{{ $super->fname }} {{ $super->lname }}</option>
            @endforeach
            </select>

        </fieldset>

        <fieldset class="contactLabel" id="contactSubject">
            <p>{!! Form::label('subject', 'Subject') !!}</p>

            <select class="form-control" name="subject">
                <option value="Please come and see me at my machine">Please come and see me at my machine</option>
                <option value="Quality Question">Quality Question</option>
                <option value="Machine Problem">Machine Problem</option>
                <option value="Need Material">Need Material</option>
                <option value="Recommendation">Recommendation</option>
            </select>
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
