<section id="content">
			<div class="section-head">
					<div class="section-title">
						<h2>Tooling</h2>
						<h5>There are currently <span class="green">{{ $count }}</span> tools.</h5>
					</div>

					<div class="add">
						<i class="fa fa-plus fa-2x" aria-hidden="true"></i>
					</div>

			</div>

			<div class="grid-view">
				<div class="list">
						<ul>
							<li><p>Name</p><p>Tool #</p><p>Edit</p><p>Delete</p></li>
							@foreach ($tools as $tool)
									<li class="tool-item">
										<p class="item-name">{{$tool->tool_name}}</p>
										<p>{{$tool->tool_name}}</p>
										<a class="edit" href="{{action('ToolingController@edit', ['$id' => $tool->tool_id])}}">EDIT</a>
										<a class="delete" href="{{action('ToolingController@destroy', ['$id' => $tool->tool_id])}}">DELETE</a>
									</li>

							@endforeach
						</ul>
				</div>
			</div>
</section>
