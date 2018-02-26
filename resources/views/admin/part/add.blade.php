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

            <div id="searchTables">

                <div id="search-tooling">
                  <fieldset class="add-item">
                    <p>{!! Form::label('tooling', 'Tooling') !!}</p>
                    <input class="itemsearchfeild" type="search" placeholder="Search Tools" id="tooling">
                  </fieldset>
                    <div class="itemResult" data-id="tooling" id="toolingResult"></div>
                </div>

                <div id="search-fixture">
                  <fieldset class="add-item">
                    <p>{!! Form::label('fixture', 'Fixtures') !!}</p>
                    <input class="itemsearchfeild" type="search" placeholder="Search Fixtures" id="fixture">
                  </fieldset>
                    <div class="itemResult" data-id="fixture" id="fixtureResult"></div>
                </div>

                <div id="search-material">
                  <fieldset class="add-item">
                    <p>{!! Form::label('material', 'Materials') !!}</p>
                    <input class="itemsearchfeild" type="search" placeholder="Search Materials" id="material">
                  </fieldset>
                    <div class="itemResult" data-id="material" id="materialResult"></div>
                </div>

            </div>

                <!-- <a class="white-button" href="{{ url('/admin/part/list')}}">CANCEL</a> -->
								<!-- <button type="submit" class="green-button" name="button">ADD</button> -->
							{!! Form::close() !!}

            <div id="opperations" class="partStep">

              <div class="formHeader">
                <h3>OPPERATIONS</h3>
              </div>

              <!-- <div class="openForm" id="addOpperation">
                <img src="../../../images/add_icon.svg" alt="add Button" class="addButt">
                <p>Add Opperation</p>
              </div>
 -->
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

            </div>


            <div id="qualityAlerts" class="partStep">

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



            </div>

				</div>
</section>
@endsection
