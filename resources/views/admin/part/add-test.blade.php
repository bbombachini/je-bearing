<!-- {!! Form::open(['class' => 'partForm', 'files' => true]) !!} -->
{!! Form::model($part, ['action' => 'PartController@store', 'id' => 'add']) !!}
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
        <!-- <input type="hidden" name="tooling" value=null> -->
        <input type="checkbox" name="tooling[]" value="1">
        <input type="checkbox" name="tooling[]" value="2">
        <input type="checkbox" name="tooling[]" value="3">
        <input type="checkbox" name="tooling[]" value="4">
        <input type="checkbox" name="tooling[]" value="5">
        <input type="checkbox" name="tooling[]" value="6">
        <!-- <input class="itemsearchfeild" type="search" placeholder="Search Tools" id="tooling"> -->
      </fieldset>
        <!-- <div class="itemResult" data-id="tooling" id="toolingResult"></div> -->
    </div>

    <div id="search-fixture">
      <fieldset class="add-item">
        <p>{!! Form::label('fixture', 'Fixtures') !!}</p>
        <input type="hidden" name="fixture" value="null">
        <input type="checkbox" name="fixture[]" value="1">
        <input type="checkbox" name="fixture[]" value="2">
        <input type="checkbox" name="fixture[]" value="3">
        <input type="checkbox" name="fixture[]" value="4">
        <input type="checkbox" name="fixture[]" value="5">
        <input type="checkbox" name="fixture[]" value="6">
        <!-- {!! Form::text('fixture', '') !!} -->
        <!-- <input class="itemsearchfeild" type="search" placeholder="Search Fixtures" id="fixture"> -->
      </fieldset>
        <!-- <div class="itemResult" data-id="fixture" id="fixtureResult"></div> -->
    </div>

    <div id="search-material">
      <fieldset class="add-item">
        <p>{!! Form::label('material', 'Materials') !!}</p>
        <input type="checkbox" name="material[]" value="1">
        <input type="checkbox" name="material[]" value="2">
        <input type="checkbox" name="material[]" value="3">
        <input type="checkbox" name="material[]" value="4">
        <input type="checkbox" name="material[]" value="5">
        <input type="checkbox" name="material[]" value="6">
        <!-- {!! Form::text('material', '') !!} -->
        <!-- <input class="itemsearchfeild" type="search" placeholder="Search Materials" id="material"> -->
      </fieldset>
        <!-- <div class="itemResult" data-id="material" id="materialResult"></div> -->
    </div>

</div>

    <!-- <a class="white-button" href="{{ url('/admin/part/list')}}">CANCEL</a> -->
    <button type="submit" class="green-button" name="button">SAVE</button>
  {!! Form::close() !!}
