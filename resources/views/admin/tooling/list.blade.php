@extends('layouts.app')

@section('content')

<section id="content">
    <div class="section-head">
            <div class="section-title">
                <h2>Tooling</h2>
                <h5>There are currently <span class="green">{{ $count }}</span> tools.</h5>
            </div>


            <div class="add-button">
				<a href="{{ url('/admin/tooling/add')}}"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a>
			</div>

    </div>

    <div class="grid-view">

        <div id="confirm" style="display:none;">
            <h2>Wait!</h2>
            <p>Are you sure you want to delete this item?</p>
            <a class="confirmDelete" href="destroy"><p>Yes, Delete</p></a>
            <a class="ignoreDelete" href="#">No, Thank You</a>
            
        </div>


        <div id="quickView" style="display:none;">
        	<img src="../../images/person.jpg" width="100px">
        	<h2>Name</h2>
        	<p>Number</p>
        	<p>Desc</p>
        </div>

        <div class="list">
        <ul>
            <li><p>Name</p><p>Tool #</p><p>Edit</p><p>Delete</p></li>
            @foreach ($tools as $tool)
                <li class="tool-item">
                <a class="item-name itemName" href="#" data-id="{{$tool->tool_id}}">{{$tool->tool_name}}</a>
                <p>{{$tool->tool_name}}</p>
                <a class="edit" href="{{action('ToolingController@edit', ['$id' => $tool->tool_id])}}">EDIT</a>
                <a class="delete" data-id="{{$tool->tool_id}}" href="#">DELETE</a>
                </li>

            @endforeach
        </ul>
        </div>
    </div>
</section>
@endsection
