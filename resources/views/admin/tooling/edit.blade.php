@extends('layouts.app')

@section('content')
<section id="content">
			<div class="section-head">
					<div class="section-title">
						<h1>Edit Tool</h1>
					</div>

					<div>
            <a id="back-button" href="{{ url('/admin/tooling/list')}}">
  						<img src="../../../images/arrow.png" alt="left arrow" id="leftarrow">
              <p>BACK TO TOOLS</p>
            </a>
					</div>
			</div>

      <div>
        <form action="{{ url('/admin/tooling/update') }}" id="add" method="post">
          {!! Form::model($old, ['action' => 'ToolingController@update']) !!}
          @foreach ($old as $object)
          {{ Form::hidden('id', $object->tool_id) }}
              <fieldset class="add-name">
                <p>{!! Form::label('name', 'Name') !!}</p>
                {!! Form::text('name', $object->tool_name, ['class' => 'form-control']) !!}
              </fieldset>

              <fieldset class="add-number">
                <p>{!! Form::label('number', 'Tool #') !!}</p>
                {!! Form::text('number', $object->tool_number, ['class' => 'form-control']) !!}
              </fieldset>

              <fieldset class="add-media">
                <p>{!! Form::label('media', 'Media') !!}</p>
                {!! Form::text('media', $object->tool_media, ['class' => 'form-control']) !!}
              </fieldset>

              <fieldset class="add-desc">
                <p>{!! Form::label('desc', 'Description') !!}</p>
                {!! Form::textarea('desc', $object->tool_desc, ['class' => 'form-control']) !!}
              </fieldset>
            @endforeach
              <!-- <a href="{{ url('/admin/tooling/list')}}"> -->
              <a class="white-button" href="{{ url('/admin/tooling/list')}}"> CANCEL</a>
              <button class="green-button" type="submit" name="button">SAVE</button>
            {!! Form::close() !!}
          </form>
      </div>
</section>
@endsection
