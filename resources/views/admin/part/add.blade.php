@extends('layouts.admin-app')

@section('content')
<section id="content">
			<div class="section-head">
					<div class="section-title">
						<h1>Add Part</h1>
					</div>

					<div>
            <a id="back-button" href="{{ url('/admin/part/list')}}">
  						<img src="../../../images/arrow.png" alt="left arrow" id="leftarrow">
              <p class="backText">BACK TO PARTS</p>
            </a>
					</div>

			</div>

      <div id="search">
          <img src="../../../images/search.png" alt="search icon" id="searchicon">
          <input class="itemsearchfeild" type="search" placeholder="search" id="tooling">

          <div class="itemResult" data-id="tooling" id="toolingResult">
          </div>
      </div>

      <div id="search">
          <img src="../../../images/search.png" alt="search icon" id="searchicon">
          <input class="itemsearchfeild" type="search" placeholder="search" id="fixture">

          <div class="itemResult" data-id="fixture" id="fixtureResult">
          </div>
      </div>

      <div id="search">
          <img src="../../../images/search.png" alt="search icon" id="searchicon">
          <input class="itemsearchfeild" type="search" placeholder="search" id="material">

          <div class="itemResult" data-id="material" id="materialResult">
          </div>
      </div>

				<div>

          <div class="formHeader">
              <h3>PART DETAILS</h3>
          </div>

            {!! Form::open(['id' => 'addPart', 'files' => true]) !!}
            <fieldset class="part-name">
              <p>{!! Form::label('partname', 'Part Name') !!}</p>
              {!! Form::text('name', '', ['required' => 'required']) !!}
            </fieldset>

            <fieldset class="part-number">
              <p>{!! Form::label('partnumber', 'Part #') !!}</p>
              {!! Form::text('number', '') !!}
            </fieldset>

            <fieldset class="add-item">
            <p>{!! Form::label('tooling', 'Tooling') !!}</p>
            {!! Form::text('search', null,
                           array('required','class'=>'addItemLabel','placeholder'=>'Choose tools')) !!}
            </fieldset>

            <fieldset class="add-item">
            <p>{!! Form::label('fixture', 'Fixture') !!}</p>
            {!! Form::text('search', null,
                           array('required','class'=>'addItemLabel','placeholder'=>'Choose fixtures')) !!}
            </fieldset>

            <fieldset class="add-item">
            <p>{!! Form::label('material', 'Material') !!}</p>
            {!! Form::text('search', null,
                           array('required','class'=>'addItemLabel', 'placeholder'=>'Choose materials')) !!}
            </fieldset>

					
                <!-- <a class="white-button" href="{{ url('/admin/part/list')}}">CANCEL</a> -->
								<button type="submit" class="green-button" name="button">ADD</button>
							{!! Form::close() !!}

				</div>
</section>
@endsection
