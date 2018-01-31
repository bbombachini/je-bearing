@extends('layouts.admin-app')

@section('content')



    <div id="dim">
            <div id="confirm">
                <a class="ignoreDelete" href="#">X</a>

                    <img src="../../images/warning.png" alt="warning icon">
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

<section id="content">
    <div class="section-head">

            <div class="section-title">
                <h2 id="bigTitle">Fixture</h2>
                <h5 id="subTitle">There are currently <span class="green">{{ $count }}</span> fixtures.</h5>
            </div>


            <div class="add-button">
				<a href="{{ url('/admin/fixture/add')}}"><img src="../../images/plusIcon.png" alt="add an item" width="25px;"></a>
			</div>

    </div>

    <div class="grid-view">
        <div id="quickView" style="display:none;">
        	<img src="../../images/person.jpg" width="100px">
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
            <li id="itemListTitles"><p>Name</p><p>Fixture #</p><p>Edit</p><p>Delete</p></li>
            @foreach ($items as $item)
                <li class="list-item">
                <div>
                  <a class="item-name itemName" href="#" data-id="{{$item->id}}">{{$item->name}}</a>
                </div>
                <div>
                  <p>{{$item->number}}</p>
                </div>
                <div class="item-column">
                  <a class="edit" href="{{action('FixtureController@edit', ['$id' => $item->id])}}">Edit</a>
                </div>
                <div class="item-column">
                  <a class="delete" data-id="{{$item->id}}" href="#">Delete</a>
                </div>


                </li>

            @endforeach
        </ul>
        </div>

    </div>
    <div id="pagination-container">
        {{ $items->links() }}
    </div>


</section>
@endsection
