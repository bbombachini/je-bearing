@extends('layouts.admin-app')

@section('content')
<section id="content">
			<div class="section-head">
					<div class="section-title">
						<h1>Add Quality Alert</h1>
					</div>
			</div>

       <div class="progress-bar-con">
            <ul class="progress-bar">
              <li id="progress-one">Part Details</li>
              <li  id="progress-two">Operations</li>
              <li class="active" id="progress-three">Quality Alerts</li>
            </ul>

            <hr id="progress-line">
        </div>

        <div class="formHeader">
          <h3>ALERT DETAILS</h3>
        </div>

        <div class="step-details">

          {!! Form::open(['id' => 'addStep', 'files' => true]) !!}

            <fieldset class="alert-notes">
              <p>{!! Form::label('notes', 'Notes') !!}</p>
              {!! Form::textarea('desc', '', ['class' => 'form-control form-add', 'size' => '10x5']) !!}
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

                <fieldset class="media-type">
                  <p>{!! Form::label('type', 'Type') !!}</p>
                  {!! Form::select('type', array('G' => 'Good', 'B' => 'Bad'), 'G');!!}
                </fieldset>

              </div>

            </div>

            <div id="addImgButt"><p>+ Add Another Image</p></div>

            
            <div id="buttonCon">
              <a href="{{ url('/admin/part/list')}}" class="white-button" id="continueButt" name="button">SAVE AND FINISH</a>
            </div>
        </div>

        

        <script type="text/javascript" src="../../../js/part.js"></script>


</section>
@endsection
