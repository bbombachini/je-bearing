<section id="navcon">

	<div id="userinfo">
		<img src="{{ $img }}"" alt="user image" width="55px">
		<div>

			<h2>{{ $name }}</h2>
			<p>{{ $position }}</p>
		</div>
	</div>

	<nav id="adminNav">
		<ul>
			<a href="#" id="part">
				<img src="images/part-line.svg" class="navicons">
				<li>Parts</li>
			</a>
			<a href="#"  id="tooling">
				<img src="images/tooling-line.svg" class="navicons">
				<li>Tooling</li>
			</a>
			<a href="#" id="fixture">
				<img src="images/fixture-line.svg" class="navicons">
				<li>Fixtures</li>
			</a>
			<a href="#" id="material">
				<img src="images/material-line.svg" class="navicons">
				<li>Materials</li>
			</a>
			<a href="#" id="comment">
				<img src="images/comment-line.svg" class="navicons">
				<li>Commments</li>
			</a>
			<a href="#" id="opperator">
				<img src="images/opperator-line.svg" class="navicons">
				<li>Opperators</li>
			</a>
			<a href="#" id="supervisor">
				<img src="images/supervisor-line.svg" class="navicons">
				<li>Supervisors</li>
			</a>
		</ul>
	</nav>

	<div id="search">
		<!--<i class="fa fa-search" aria-hidden="true" id="searchicon"></i>-->
		<input id="searchfeild" type="search" placeholder="search">
	</div>

	<div id="logout">
		<i class="fa fa-angle-left fa-2x" aria-hidden="true" id="logoutArrow"></i>
		<a href="#"></a><p>LOGOUT</p></a>
	</div>
	


</section>