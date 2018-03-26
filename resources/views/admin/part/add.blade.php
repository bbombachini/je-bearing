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
              <li id="progress-one">Part Details</li>
              <li  id="progress-two">Operations</li>
              <li class="active" id="progress-three">Quality Alerts</li>
            </ul>
            <hr id="progress-line">
        </div>

          <div class="formHeader">
              <h3>PART DETAILS</h3>
          </div>

            {!! Form::open(['id' => 'addPart', 'files' => true]) !!}
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
              {!! Form::select('category', array('' => 'Select a Category &#x25BC;', '1' => 'Work Instructions', '2' => 'Assembly', '3' => 'Repair & Overhaul'), null, ['class' => 'form-select', 'required' => 'required']) !!}
            </fieldset>

                <a class="white-button" href="{{ url('/admin/part/list')}}">CANCEL</a>
								<button type="submit" class="green-button next" name="button">SAVE</button>
							{!! Form::close() !!}



            <!-- <div id="opperations" class="partStep">

              <div class="formHeader">
                <h3>OPERATIONS</h3>
              </div>

              <div class="opperInfo">

                 <fieldset class="alert-name">
                  <p>{!! Form::label('opername', 'Name') !!}</p>
                  {!! Form::text('name', '', ['required' => 'required', 'class' => 'form-control']) !!}
                  </fieldset>


                  <fieldset class="add-media">
                  <p>{!! Form::label('media', 'Media') !!}</p>
                  {!! Form::file('media', ['class' => 'form-control']) !!}
                  </fieldset>

              </div>

              <div id="stepForm" class="subForm">

                <div class="subFormHeader">
                  <h3>STEP</h3>
                  <p>Delete</p>
                </div>

                  {!! Form::open(['id' => 'addStep', 'files' => true]) !!}


                  <fieldset class="alert-name">
                  <p>{!! Form::label('stepname', 'Name') !!}</p>
                  {!! Form::text('name', '', ['required' => 'required', 'class' => 'form-control']) !!}
                  </fieldset>


                  <fieldset class="add-media">
                  <p>{!! Form::label('media', 'Media') !!}</p>
                  {!! Form::file('media', ['class' => 'form-control']) !!}
                  </fieldset>

                  <fieldset class="add-desc">
                  <p>{!! Form::label('desc', 'Description') !!}</p>
                  {!! Form::textarea('desc', '', ['class' => 'form-add', 'size' => '50x5']) !!}
                  </fieldset>

                  <fieldset class="add-instruct">
                  <p>{!! Form::label('special-instructions', 'Special Instructions') !!}</p>
                  {!! Form::textarea('instruct', '', ['class' => 'form-add', 'size' => '50x5']) !!}
                  </fieldset>


                  {!! Form::close() !!}
              </div>
              <p class="addSubForm">Add Another Step</p>

            </div> -->


            <!-- <div id="qualityAlerts" class="partStep">

              <div class="formHeader">
                  <h3>QUALITY ALERTS</h3>
              </div>

              <div class="openForm" id="addAlert">
                <img src="../../../images/add_icon.svg" alt="add Button" class="addButt">
                <p>Add Quality Alert</p>
              </div>


              <div id="qualityForm" class="subForm">

                <div class="subFormHeader">
                  <h3>QUALITY ALERT</h3>
                  <p>Delete</p>
                </div>

                  {!! Form::open(['id' => 'addQualityAlert', 'files' => true]) !!}


                  <fieldset class="alert-name">
                  <p>{!! Form::label('alertname', 'Name') !!}</p>
                  {!! Form::text('name', '', ['required' => 'required', 'class' => 'form-control']) !!}
                  </fieldset>


                  <fieldset class="add-media">
                  <p>{!! Form::label('media', 'Media') !!}</p>
                  {!! Form::file('media', ['class' => 'form-control']) !!}
                  </fieldset>

                  <fieldset class="add-desc">
                  <p>{!! Form::label('desc', 'Description') !!}</p>
                  {!! Form::textarea('desc', '', ['class' => 'form-add', 'size' => '50x5']) !!}
                  </fieldset>

                  <fieldset class="add-instruct">
                  <p>{!! Form::label('special-instructions', 'Special Instructions') !!}</p>
                  {!! Form::textarea('instruct', '', ['class' => 'form-add', 'size' => '50x5']) !!}
                  </fieldset>


                  {!! Form::close() !!}
              </div>
              <p class="addSubForm">Add Another Quality Alert</p>



            </div> -->

				</div>
</section>
@endsection
