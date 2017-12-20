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
              <p class="backText">BACK TO TOOLS</p>
            </a>
					</div>
			</div>

      <div>
          {!! Form::model($old, ['action' => 'ToolingController@update', 'id' => 'edit', 'files' => true]) !!}
          @foreach ($old as $tool)
          {{ Form::hidden('id', $tool->tool_id) }}
              <fieldset class="add-name">
                <p>{!! Form::label('name', 'Name') !!}</p>
                {!! Form::text('name', $tool->tool_name, ['class' => 'form-control']) !!}
              </fieldset>

              <fieldset class="add-number">
                <p>{!! Form::label('number', 'Tool #') !!}</p>
                {!! Form::text('number', $tool->tool_number, ['class' => 'form-control']) !!}
              </fieldset>

              <fieldset class="add-desc">
                <p>{!! Form::label('desc', 'Description') !!}</p>
                {!! Form::textarea('desc', $tool->tool_desc, ['class' => 'form-control']) !!}
              </fieldset>

              <fieldset class="add-media">
                <img src="{{url($photo)}}" alt="{{ $old }}">
                <!-- <button type="button" name="edit-photo">Edit Photo</button> -->
	              {!! Form::file('media', ['class' => 'form-control']) !!}
								@if($defaultPhoto === 1)
									<a href="{{action('ToolingController@editMedia', ['$id' => $tool->tool_id])}}">Add Photo</a>
								@else
								<a href="#">Change Photo</a>
								<a href="{{action('ToolingController@destroyMedia', ['$id' => $tool->tool_id])}}">Delete Photo</a>
								@endif
											<div id="edit-link">
												<a href="#">Edit</a>
											</div>
              </fieldset>

            @endforeach
              <!-- <a href="{{ url('/admin/tooling/list')}}"> -->
              <a class="white-button" href="{{ url('/admin/tooling/list')}}"> CANCEL</a>
              <button class="green-button" type="submit" name="button">SAVE</button>
            {!! Form::close() !!}
      </div>
</section>
@endsection
