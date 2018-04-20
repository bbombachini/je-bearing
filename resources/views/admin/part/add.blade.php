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

				<div>
					<div class="progress-bar-con">
            <ul class="progress-bar">
              <li id="progress-one" class="active">Part Details</li>
              <li id="progress-two">Operations</li>
              <li id="progress-three">Quality Alerts</li>
            </ul>
            <hr id="progress-line">
        </div>

          <div class="formHeader">
              <h3>PART DETAILS</h3>
          </div>

            {!! Form::open(['id' => 'addPart', 'class' => 'partForm']) !!}
            <fieldset class="part-name">
              <p>{!! Form::label('name', 'Part Name') !!}</p>
              {!! Form::text('name', '', ['required' => 'required']) !!}
            </fieldset>

            <fieldset class="part-number">
              <p>{!! Form::label('number', 'Part #') !!}</p>
              {!! Form::text('number', '', ['required' => 'required']) !!}
            </fieldset>

            <div id="searchTables">

                <div id="search-tooling">
                  <fieldset class="add-item">
                    <p>{!! Form::label('tooling', 'Tooling') !!}</p>
                    <input class="itemsearchfeild" type="search" placeholder="Search Tools" id="tooling">
                  </fieldset>
                    <ul class="itemResult" data-id="tooling" id="toolingResult"></ul>
                </div>

                <div class="listItem tooling">
                    <ul data-id="toolingList">

                    </ul>
                </div>

                <div id="search-fixture">
                  <fieldset class="add-item">
                    <p>{!! Form::label('fixture', 'Fixtures') !!}</p>
                    <input class="itemsearchfeild" type="search" placeholder="Search Fixtures" id="fixture">
                  </fieldset>
                    <ul class="itemResult" data-id="fixture" id="fixtureResult"></ul>
                </div>

                <div class="listItem fixture">
                    <ul data-id="fixtureList" >
                    </ul>
                </div>

                <div id="search-material">
                  <fieldset class="add-item">
                    <p>{!! Form::label('material', 'Materials') !!}</p>
                    <input class="itemsearchfeild" type="search" placeholder="Search Materials" id="material">
                  </fieldset>
                    <ul class="itemResult" data-id="material" id="materialResult"></ul>
                </div>

                <div class="listItem material">
                    <ul data-id="materialList">
                    </ul>
                </div>

            </div>

						<fieldset class="part-category">
							<p>{!! Form::label('category', 'Category') !!}</p>
              {!! Form::select('category', array(' ' => 'Select a Category &#x25BC;', '1' => 'Work Instructions', '2' => 'Assembly', '3' => 'Repair & Overhaul'), null, ['class' => 'form-select', 'required']) !!}
            </fieldset>

            <div id="buttonCon">
               <a href="{{ url('/admin/part/list')}}" class="white-button" name="button">SAVE AND FINISH</a>
               <a href="#" class="white-button" id="continueButt" name="button">SAVE AND CONTINUE</a>
							 <!--  used to redirect to {{ url('/admin/part/add-operation')}} -->
            </div>
			   {!! Form::close() !!}



            </div>

				</div>
</section>
@endsection
