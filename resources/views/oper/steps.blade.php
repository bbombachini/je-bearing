@extends('layouts.opp-app')

@section('content')

    <section id="content">
    <div class="section-head">

            <div class="section-title">
                <h2 id="bigTitle">Build</h2>
                <h5 id="subTitle">Follow these steps to complete this part.</h5>
            </div>

            <div class="top-left">
              <a href="{{ url('/home')}}">
                <img src="../../../images/home-icon.png" width="20px" alt="go home">
                <p>HOME</p>
              </a>
            </div>
    </div>

    <div id="operations">

        <div class="opItem">

            <div class="opInfo">
                <p class="opItemTitle">Operation 1</p>
                <p class="viewOpImg">View Image</p>
                <p class="viewOpComments">1 Comment</p>
            </div>

            <div class="opOpen">

                <div class="opHeader">

                    <p>Operation 1</p>
                    <p class="viewOpImg">View Image</p>
                    <p class="viewOpTools">View Tools</p>
                    <p class="viewOpComments">1 Comment</p>

                </div>

                <div id="steps">

                    <div class="stepItem">
                        <p class=stepTitle>1.1: Step Title</p>
                        <p class="stepDesc">This is the step description. Follow these instructions along with the image below to properly comlete this step. Then scroll down to the next step.</p>
                        <p class="stepNote"><span class="yellow">Note:</span> This is a note written about this step.</p>
                        <img src="../../images/placeholderImg.jpg" alt="step Image" class="stepImage">
                    </div>


                    <div class="stepItem">
                        <h3 class=stepTitle>1.2: Step Title</h3>
                        <p class="stepDesc">This is the step description. Follow these instructions along with the image below to properly comlete this step. Then scroll down to the next step.</p>
                        <p class="stepNote"><span class="yellow">Note:</span> This is a note written about this step.</p>
                        <img src="../../images/placeholderImg.jpg" alt="step Image" class="stepImage">
                    </div>

                </div>
            </div>

        </div>
        

        <div class="opItem">

            <div class="opInfo">
                <p class="opItemTitle">Operation 2</p>
                <p class="viewOpImg">View Image</p>
                <p class="viewOpComments">3 Comments</p>
            </div>

            <div class="opOpen">

                <div class="opHeader">

                    <p>Operation 1</p>
                    <p class="viewOpImg">View Image</p>
                    <p class="viewOpTools">View Tools</p>
                    <p class="viewOpComments">3 Comment</p>

                </div>

                <div id="steps">

                    <div class="stepItem">
                        <p class=stepTitle>1.1: Step Title</p>
                        <p class="stepDesc">This is the step description. Follow these instructions along with the image below to properly comlete this step. Then scroll down to the next step.</p>
                        <p class="stepNote"><span class="yellow">Note:</span> This is a note written about this step.</p>
                        <img src="../../images/placeholderImg.jpg" alt="step Image" class="stepImage">
                    </div>


                    <div class="stepItem">
                        <h3 class=stepTitle>1.2: Step Title</h3>
                        <p class="stepDesc">This is the step description. Follow these instructions along with the image below to properly comlete this step. Then scroll down to the next step.</p>
                        <p class="stepNote"><span class="yellow">Note:</span> This is a note written about this step.</p>
                        <img src="../../images/placeholderImg.jpg" alt="step Image" class="stepImage">
                    </div>

                </div>
            </div>

        </div>

        <div class="opItem">

            <div class="opInfo">
                <p class="opItemTitle">Operation 3</p>
                <p class="viewOpImg">View Image</p>
                <p class="viewOpComments">2 Comment</p>
            </div>

            <div class="opOpen">

                <div class="opHeader">

                    <p>Operation 1</p>
                    <p class="viewOpImg">View Image</p>
                    <p class="viewOpTools">View Tools</p>
                    <p class="viewOpComments">2 Comment</p>

                </div>

                <div id="steps">

                    <div class="stepItem">
                        <p class=stepTitle>1.1: Step Title</p>
                        <p class="stepDesc">This is the step description. Follow these instructions along with the image below to properly comlete this step. Then scroll down to the next step.</p>
                        <p class="stepNote"><span class="yellow">Note:</span> This is a note written about this step.</p>
                        <img src="../../images/placeholderImg.jpg" alt="step Image" class="stepImage">
                    </div>


                    <div class="stepItem">
                        <h3 class=stepTitle>1.2: Step Title</h3>
                        <p class="stepDesc">This is the step description. Follow these instructions along with the image below to properly comlete this step. Then scroll down to the next step.</p>
                        <p class="stepNote"><span class="yellow">Note:</span> This is a note written about this step.</p>
                        <img src="../../images/placeholderImg.jpg" alt="step Image" class="stepImage">
                    </div>

                </div>
            </div>

        </div>
        
        
    </div>




</section>


@endsection
