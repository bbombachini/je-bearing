@extends('layouts.admin-app')

@section('content')
<section id="content">
			<div class="section-head">
					<div class="section-title">
						<h1>Add Step</h1>
					</div>

					<div>
            <a id="back-button" href="{{ url('/admin/step/list')}}">
  						<img src="../../../images/arrow.png" alt="left arrow" id="leftarrow">
              <p class="backText">BACK TO STEP</p>
            </a>
					</div>

			</div>

				<div>

            {!! Form::model($step, ['action' => 'StepController@store', 'id' => 'add', 'files' => true]) !!}
            <fieldset class="add-name">
              <p>{!! Form::label('title', 'Title') !!}</p>
              {!! Form::text('title', '', ['required' => 'required']) !!}
            </fieldset>

            <fieldset class="add-media">
              <p>{!! Form::label('media', 'Media') !!}</p>
              {!! Form::file('media') !!}
            </fieldset>

						<fieldset class="add-desc">
              <p>{!! Form::label('desc', 'Description') !!}</p>
              {!! Form::textarea('desc', '', ['class' => 'form-control form-add', 'size' => '50x10']) !!}
						</fieldset>
                <a class="white-button" href="{{ url('/admin/step/list')}}">CANCEL</a>
								<button type="submit" class="green-button" name="button">ADD</button>
							{!! Form::close() !!}

				</div>
</section>
@endsection