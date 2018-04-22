@extends('layouts.admin-app')

@section('content')
<section id="content">
  <div class="section-head">
      <div class="section-title">
        <h1>Steps</h1>
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
    <h3>STEPS - Operation #{{$operNumber}}: {{$operName}}</h3>
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

  <div class="grid-view">
      <div id="quickView" style="display:none;">
        <img src="/images/person.jpg" width="100px">
        <h2>Name</h2>
        <p>Number</p>
        <p>Desc</p>
       </div>

      <div id="confirm" style="display:none;">
          <h2>Wait!</h2>
          <p>Are you sure you want to delete this item?</p>
          <a class="confirmDelete" href="destroy"><p>Yes, Delete</p></a>
          <a class="ignoreDelete" href="#">No, Thank You</a>

      </div>

      <div class="list">
        <ul>
          @foreach ($items as $item)
            <li class="list-item">
              <div class="item-order">
                <span>#{{$item->pivot->order}}</span>
              </div>
              <div>
                <a class="item-name itemName" href="#" data-id="{{$item->id}}">{{$item->title}}</a>
              </div>
              <div class="item-column">
                <a class="edit" href="{{action('StepController@edit', ['$id' => $item->id])}}">Edit</a>
              </div>
              <div class="item-column">
                <a class="delete" data-id="{{$item->id}}" href="#">Delete</a>
              </div>
            </li>
          @endforeach
        </ul>
      </div>

  </div>

  <div id="operations">

    <div class="section-title small">
      <h1>Add Step</h1>
    </div>

    <div class="operInfo">
      {!! Form::model($step, ['action' => 'StepController@store', 'class' => 'addOper', 'files' => true]) !!}
       <fieldset class="add-name">
        <p>{!! Form::label('name', 'Name') !!}</p>
        {!! Form::text('name', '', ['required' => 'required', 'class' => 'form-control']) !!}
        </fieldset>

        <fieldset class="add-number">
         <p>{!! Form::label('order', 'Order') !!}</p>
         {!! Form::number('order', '', ['required' => 'required', 'class' => 'form-control']) !!}
         </fieldset>

				 <fieldset class="add-desc">
					 <p>{!! Form::label('desc', 'Description') !!}</p>
					 {!! Form::textarea('desc', '', ['class' => 'form-control form-add', 'size' => '20x5']) !!}
				 </fieldset>

        <fieldset class="add-media">
        <p>{!! Form::label('media', 'Media') !!}</p>
        {!! Form::file('media', ['class' => 'form-control']) !!}
        </fieldset>

        {!! Form::hidden('oper', $operId) !!}


        <div id="buttonCon">
          <a href="{{ url('/admin/operation/edit/')}}/{{$operId}}" class="white-button oper-next">BACK</a>
          <button type="submit" class="white-button oper-next" name="continue" id="saveContinueButt">SAVE AND CONTINUE</button>
        </div>

      {!! Form::close() !!}
    </div>
  </div>

</section>
@endsection
