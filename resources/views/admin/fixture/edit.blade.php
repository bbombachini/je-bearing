@extends('layouts.admin-app')

@section('content')
<div id="dim">
				<div id="confirm">
						<a class="ignoreDelete" href="#">X</a>

								<img src="../../../images/warning.png" alt="warning icon">
								<h2>Wait!</h2>
								<p>Are you sure you want to delete this photo?</p>
								<a id="deletePhoto" class="confirmDelete" href="../destroyMedia">Yes, Delete</a>
				</div>
				<div id="dimClick2"></div>
</div>

<section id="content">
			<div class="section-head">
					<div class="section-title">
						<h1>Edit Fixture</h1>
					</div>

					<div>
            <a id="back-button" href="{{ url('/admin/fixture/list')}}">
  						<img src="../../../images/arrow.png" alt="left arrow" id="leftarrow">
              <p class="backText">BACK TO FIXTURES</p>
            </a>
					</div>
			</div>

      <div>
          {!! Form::model($old, ['action' => 'FixtureController@update', 'id' => 'edit', 'files' => true]) !!}
          @foreach ($old as $fixture)
          {{ Form::hidden('id', $fixture->id) }}
              <fieldset class="add-name">
                <p>{!! Form::label('name', 'Name') !!}</p>
                {!! Form::text('name', $fixture->name, ['class' => 'form-control', 'required' => 'required']) !!}
              </fieldset>

              <fieldset class="add-number">
                <p>{!! Form::label('number', 'Fixture #') !!}</p>
                {!! Form::text('number', $fixture->number, ['class' => 'form-control']) !!}
              </fieldset>

              <fieldset class="add-desc">
                <p>{!! Form::label('desc', 'Description') !!}</p>
                {!! Form::textarea('desc', $fixture->desc, ['class' => 'form-control form-edit', 'size' => '50x10']) !!}
              </fieldset>

              <fieldset class="add-media">
								<p>Click on the Image to Edit</p>
								<div class="image-hover">
	                <img src="{{url($photo)}}" alt="{{ $fixture->name }} image">

									@if($defaultPhoto === 1)
									<div class="edit-link">
										<div class="links">
											{!! Form::label('media', 'Add Photo') !!}
											{!! Form::file('media', ['class' => 'form-control']) !!}
										</div>
									</div>
									@else
										<div class="edit-link">
											<div class="links">
												{!! Form::label('media', 'Edit') !!}
												{!! Form::file('media', ['class' => 'form-control']) !!}
												<a class="delete" data-id="{{$fixture->id}}" href="#">Delete</a>
											</div>
										</div>
									@endif
								</div>
              </fieldset>

            @endforeach
	              <a class="white-button" href="{{ url('/admin/fixture/list')}}"> CANCEL</a>
	              <button class="green-button" type="submit" name="button">SAVE</button>
            {!! Form::close() !!}
      </div>
</section>
@endsection
