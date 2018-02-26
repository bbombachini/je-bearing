@extends('layouts.admin-app')

@section('content')
<section id="content">
			<div class="section-head">
					<div class="section-title">
						<h1>Add User</h1>
					</div>

					<div>
            <a id="back-button" href="{{ url('/admin/user/list')}}">
  						<img src="../../../images/arrow.png" alt="left arrow" id="leftarrow">
              <p class="backText">BACK TO USERS</p>
            </a>
					</div>

			</div>

				<div>

            {!! Form::model($user, ['action' => 'UsersController@store', 'id' => 'add', 'files' => true]) !!}
						<fieldset class="add-name">
              <p>{!! Form::label('fname', 'First Name') !!}</p>
              {!! Form::text('fname', '', ['class' => 'form-control', 'required' => 'required']) !!}
							<p>{!! Form::label('lname', 'Last Name') !!}</p>
              {!! Form::text('lname', '', ['class' => 'form-control', 'required' => 'required']) !!}
            </fieldset>

						<fieldset class="add-contact">
              <p>{!! Form::label('email', 'Email') !!}</p>
              {!! Form::email('email', '', ['class' => 'form-control', 'required' => 'required']) !!}
							<p>{!! Form::label('password', 'Password') !!}</p>
              {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
            </fieldset>

						<fieldset class="add-employee-info">
              <p>{!! Form::label('employee_id', 'Employee ID#') !!}</p>
              {!! Form::text('employee_id', '', ['class' => 'form-control', 'required' => 'required']) !!}
							<p>{!! Form::label('role', 'Role') !!}</p>
              {!! Form::select('role', array('3' => 'Operator', '2' => 'Supervisor', '1' => 'Admin'), ['class' => 'form-select', 'required' => 'required']) !!}
            </fieldset>

						<fieldset class="add-access">
							<p>{!! Form::label('phone', 'Phone') !!}</p>
              {!! Form::text('phone', '', ['class' => 'form-control']) !!}
							<p>{!! Form::label('repair_access', 'Repair and Overhaul') !!}</p>
							{!! Form::hidden('repair_access', 0, ['id' => 'hidden_repair_access']) !!}
              {!! Form::checkbox('repair_access', 1) !!}
							<p>{!! Form::label('instructions_access', 'Work Instructions') !!}</p>
							{!! Form::hidden('instructions_access', 0, ['id' => 'hidden_instructions_access']) !!}
							{!! Form::checkbox('instructions_access', 1) !!}
							<p>{!! Form::label('assembly_access', 'Assembly') !!}</p>
							{!! Form::hidden('assembly_access', 0, ['id' => 'hidden_assembly_access']) !!}
							{!! Form::checkbox('assembly_access', 1) !!}
						</fieldset>

						<fieldset class="add-media">
              <p>{!! Form::label('media', 'Photo') !!}</p>
              {!! Form::file('media', ['class' => 'form-control']) !!}
            </fieldset>

						<a class="white-button" href="{{ url('/admin/users/list')}}">CANCEL</a>
						<button type="submit" class="green-button" name="button">ADD</button>
					{!! Form::close() !!}

				</div>
</section>
@endsection
