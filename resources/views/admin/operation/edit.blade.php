@extends('layouts.admin-app')

@section('content')
<section id="content">
  <div class="section-head">
      <div class="section-title">
        <h1>Edit Operation</h1>
      </div>
  </div>

  <div class="progress-bar-con">
      <ul class="progress-bar">
        <li id="progress-one">Part Details</li>
        <li id="progress-two" class="active" >Operations</li>
        <li id="progress-three">Quality Alerts</li>
      </ul>

      <hr id="progress-line">
  </div>

  <div class="formHeader">
    <h3>OPERATION: {{$old[0]->title}}</h3>
  </div>

  <div id="dim">
          <div id="confirm">
              <a class="ignoreDelete" href="#">X</a>

                  <img src="/images/warning.png" alt="warning icon">
                  <h2>Wait!</h2>
                  <p>Are you sure you want to delete this?</p>
                  <a id="deleteItem" class="confirmDelete" href="destroy">Yes, Delete</a>

          </div>
          <div id="dimClick2"></div>
  </div>

  <div id="dim2">
      <div id="dimClick"></div>
      <div id="quickView">
          <a class="xButt" href="#">X</a>

          <div id="itemImgInfo">

              <div id="itemImg">
                  <!-- <img src="../../images/placeholderImg.jpg" alt="placeholder Image"> -->
                  <img src="" alt="Image">
              </div>

              <div id="itemInfo">
                  <h2 id="itemname"></h2>
                  <p id="number"></p>
              </div>

          </div>

          <p id="desc"></p>
          <a class="confirmEdit" href="#">Edit</a>

      </div>
  </div>

  <div id="operations">

    <div class="operInfo">
      {!! Form::model($old, ['action' => 'OperationController@update', 'id' => 'edit', 'class' => 'editOper', 'files' => true]) !!}
      @foreach ($old as $operation)
      {{ Form::hidden('id', $operation->id) }}
       <fieldset class="add-name">
        <p>{!! Form::label('name', 'Name') !!}</p>
        {!! Form::text('name', $operation->title, ['required' => 'required', 'class' => 'form-control']) !!}
        </fieldset>

        <fieldset class="add-number">
         <p>{!! Form::label('order', 'Order') !!}</p>
         {!! Form::number('order', $partInfo[0]->pivot->order, ['required' => 'required', 'class' => 'form-control']) !!}
         </fieldset>

        <fieldset class="add-media">
        <p>{!! Form::label('media', 'Media') !!}</p>
        {!! Form::file('media', ['class' => 'form-control']) !!}
        </fieldset>
        @endforeach
        <!-- <button type="submit" class="white-button oper-next" name="finish">SAVE AND FINISH</button> -->
        <!-- <button type="submit" class="white-button oper-next" name="continue">SAVE AND CONTINUE</button> -->
        <div id="buttonCon">
          <button type="submit" class="white-button oper-next" name="continue">SAVE</button>
        </div>
      {!! Form::close() !!}
        
    </div>
  </div>

</section>
@endsection
