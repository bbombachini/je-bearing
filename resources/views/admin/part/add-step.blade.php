@extends('layouts.admin-app')

@section('content')
<section id="content">
			<div class="section-head">
					<div class="section-title">
						<h1>Add Step</h1>
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

        <div class="step-details">
          <h3>STEP DETAILS</h3>

          {!! Form::open(['id' => 'addStep', 'files' => true]) !!}
            <fieldset class="step-name">
              <p>{!! Form::label('name', 'Step Name') !!}</p>
              {!! Form::text('name', '', ['required' => 'required', 'class' => 'form-control form-add']) !!}
            </fieldset>

            <fieldset class="step-desc">
              <p>{!! Form::label('description', 'Description') !!}</p>
              {!! Form::textarea('desc', '', ['class' => 'form-control form-add', 'size' => '10x5']) !!}
            </fieldset>

            <fieldset class="step-instructions">
              <p>{!! Form::label('instructions', 'Instructions') !!}</p>
              {!! Form::textarea('instructions', '', ['class' => 'form-control form-add', 'size' => '10x5']) !!}
            </fieldset>

            <div class="step-image">

              <div class="step-image-item">
              <fieldset class="add-media">
                <p>{!! Form::label('media', 'Add Image') !!}</p>
                {!! Form::file('media', ['class' => 'form-control']) !!}
              </fieldset>

               <fieldset class="media-caption">
                <p>{!! Form::label('caption', 'Caption') !!}</p>
                {!! Form::text('caption', '', ['class' => 'form-control form-add']) !!}
              </fieldset>
              </div>

            </div>
        </div>

        <div id="images"><p>+ Add Another Image</p></div>

        <script type="text/javascript" src="../../../js/part.js"></script>


</section>
@endsection
