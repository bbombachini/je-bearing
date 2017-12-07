@include('partials.head')

@include('partials.nav')

<section id="content">
			<div class="section-head">
					<div class="section-title">
						<h1>Add Tool</h1>
					</div>

					<div>
            <a id="back-button" href="/admin/tooling/list">
  						<img src="../../images/arrow.png" alt="left arrow" id="leftarrow">
              <p>BACK TO TOOLS</p>
            </a>
					</div>

			</div>

				<div>
          <form id="add" method="post">
            {!! Form::model($tool, ['action' => 'ToolingController@store']) !!}
            <fieldset class="add-name">
              <p>{!! Form::label('name', 'Name') !!}</p>
              {!! Form::text('name', '', ['class' => 'form-control']) !!}
            </fieldset>

            <fieldset class="add-number">
              <p>{!! Form::label('number', 'Tool #') !!}</p>
              {!! Form::text('number', '', ['class' => 'form-control']) !!}
            </fieldset>

            <fieldset class="add-media">
              <p>{!! Form::label('media', 'Media') !!}</p>
              {!! Form::text('media', 'Add Photo', ['class' => 'form-control']) !!}
            </fieldset>

						<fieldset class="add-desc">
              <p>{!! Form::label('desc', 'Description') !!}</p>
              {!! Form::textarea('desc', '', ['class' => 'form-control']) !!}
						</fieldset>
                <button type="cancel" class="white-button" name="button">CANCEL</button>
								<button type="submit" class="green-button" name="button">ADD</button>
							{!! Form::close() !!}
          </form>
				</div>
</section>


@include('partials.footer')
