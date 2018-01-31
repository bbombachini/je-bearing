@extends('layouts.opp-app')

@section('content')

    <section id="content">
    <div class="section-head">

            <div class="section-title">
                <h2 id="bigTitle">Quality Alerts</h2>
                <h5 id="subTitle">Keey an eye on the following items.</h5>
            </div>
    </div>

    <div id="steps">

    	<div class="stepItem">
	    	<h3 class=stepTitle>Alert One: Alert Title</h3>
	    	<p class="stepDesc">This is the Alert descriotion. Follow these instructions along with the image below to properly comlete this step. Then scroll down to the next step.</p>
	    	<p class="stepNote"><span class="yellow">Note:</span> This is a note written about this alert.</p>
            <img src="../../images/placeholderImg.jpg" alt="step Image" class="stepImage">
            
    	</div>

    </div>

</section>


@endsection
