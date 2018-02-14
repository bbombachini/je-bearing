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
						<h1>Edit User</h1>
					</div>

					<div>
            <a id="back-button" href="{{ url('/admin/user/list')}}">
  						<img src="../../../images/arrow.png" alt="left arrow" id="leftarrow">
              <p class="backText">BACK TO USERS</p>
            </a>
					</div>
			</div>

      <div>
          {!! Form::model($old, ['action' => 'UsersController@update', 'id' => 'edit', 'files' => true]) !!}
          @foreach ($old as $user)
          {{ Form::hidden('id', $user->id) }}
              <fieldset class="add-name">
                <p>{!! Form::label('fname', 'First Name') !!}</p>
                {!! Form::text('fname', $user->fname, ['class' => 'form-control', 'required' => 'required']) !!}
								<p>{!! Form::label('lname', 'Last Name') !!}</p>
                {!! Form::text('lname', $user->lname, ['class' => 'form-control', 'required' => 'required']) !!}
              </fieldset>

							<fieldset class="add-contact">
	              <p>{!! Form::label('email', 'Email') !!}</p>
	              {!! Form::email('email', $user->email, ['class' => 'form-control', 'required' => 'required']) !!}
	            </fieldset>

							<fieldset class="add-employee-info">
	              <p>{!! Form::label('employee_id', 'Employee ID#') !!}</p>
	              {!! Form::text('employee_id', $user->employee_id, ['class' => 'form-control', 'required' => 'required']) !!}
								<p>{!! Form::label('role', 'Role') !!}</p>
	              {!! Form::select('role', array('3' => 'Operator', '2' => 'Supervisor', '1' => 'Admin'), $user->role, ['class' => 'form-select', 'required' => 'required']) !!}
	            </fieldset>

							<fieldset class="add-access">
								<p>{!! Form::label('phone', 'Phone') !!}</p>
								{!! Form::text('phone', $user->phone, ['class' => 'form-control']) !!}
								<p>{!! Form::label('repair_access', 'Repair and Overhaul') !!}</p>
								{!! Form::hidden('repair_access', 0, ['id' => 'hidden_repair_access']) !!}
								{!! Form::checkbox('repair_access', 1, $user->repair_access) !!}
								<p>{!! Form::label('instructions_access', 'Work Instructions') !!}</p>
								{!! Form::hidden('instructions_access', 0, ['id' => 'hidden_instructions_access']) !!}
								{!! Form::checkbox('instructions_access', 1, $user->instructions_access) !!}
								<p>{!! Form::label('assembly_access', 'Assembly') !!}</p>
								{!! Form::hidden('assembly_access', 0, ['id' => 'hidden_assembly_access']) !!}
								{!! Form::checkbox('assembly_access', 1, $user->assembly_access) !!}
							</fieldset>

              <fieldset class="add-media">
								<p>Click on the Image to Edit</p>
								<div class="image-hover">
	                <img src="{{url($user->photo)}}" alt="{{ $user->lname }} image">

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
												<a class="delete" data-id="{{$user->id}}" href="#">Delete</a>
											</div>
										</div>
									@endif
								</div>
              </fieldset>

            @endforeach
	              <a class="white-button" href="{{ url('/admin/user/list')}}"> CANCEL</a>
	              <button class="green-button" type="submit" name="button">SAVE</button>
            {!! Form::close() !!}
      </div>
</section>
@endsection
