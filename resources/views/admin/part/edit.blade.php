@extends('layouts.admin-app')

@section('content')
<section id="content">
			<div class="section-head">
					<div class="section-title">
						<h1>Edit Part</h1>
					</div>

					<div>
            <a id="back-button" href="{{ url('/admin/part/list')}}">
  						<img src="../../../images/arrow.png" alt="left arrow" id="leftarrow">
              <p class="backText">BACK TO PARTS</p>
            </a>
					</div>

			</div>

				<div>
				<!-- @include('partials.progressbar') -->

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


						{!! Form::open(['id' => 'editPart', 'class' => 'partForm', 'files' => true]) !!}
						@foreach ($old as $part)
	            <fieldset class="part-name">
	              <p>{!! Form::label('name', 'Part Name') !!}</p>
	              {!! Form::text('name', $part->name, ['required' => 'required']) !!}
	            </fieldset>

	            <fieldset class="part-number">
	              <p>{!! Form::label('number', 'Part #') !!}</p>
	              {!! Form::text('number', $part->number, ['required' => 'required']) !!}
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
											@foreach ($oldTool as $tool)
												<li class="selected" data-id={{$tool->id}}>
													<p>{{$tool->name}}</p>
													<span class="popItem">X</span>
												</li>
											@endforeach
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
											@foreach ($oldFixture as $fixture)
												<li class="selected" data-id={{$fixture->id}}>
													<p>{{$fixture->name}}</p>
													<span class="popItem">X</span>
												</li>
											@endforeach
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
											@foreach ($oldMaterial as $material)
												<li class="selected" data-id={{$material->id}}>
													<p>{{$material->name}}</p>
													<span class="popItem">X</span>
												</li>
											@endforeach
                    </ul>
	               </div>
	            </div>

							<fieldset class="part-category">
								<p>{!! Form::label('category', 'Category') !!}</p>
	              {!! Form::select('category', array('' => 'Select a Category &#x25BC;', '1' => 'Work Instructions', '2' => 'Assembly', '3' => 'Repair & Overhaul'), $part->category, ['class' => 'form-select', 'required' => 'required']) !!}
	            </fieldset>

						@endforeach

					<div id="buttonCon">
            			<a class="white-button" href="{{ url('/admin/part/list')}}">CANCEL</a>
          				<button type="submit" class="white-button next" id="continueButt" name="continue">SAVE AND CONTINUE</button>
          			</div>

					{!! Form::close() !!}

				</div>
</section>
@endsection
