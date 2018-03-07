@extends('layouts.opp-app')

@section('content')

    <div id="itemLibraryCon">
         <div id="libraryHeader">
            <h3>Tools for Part #123</h3>
            <a href="" id="xButt"><h2>X</h2></a>
        </div>

        <div id="itemLibrary">

                <ul class="grid-list">

                  <li class="item">
                    <div class="item-media">
                        <img src="../../../images/1513641735.jpg" alt="item Image">
                      <div class="item-desc">
                        <h3>Hammer</h3>
                      </div>
                    </div>
                  </li>

                   <li class="item">
                    <div class="item-media">
                        <img src="../../../images/1513641735.jpg" alt="item Image">
                      <div class="item-desc">
                        <h3>Saw</h3>
                      </div>
                    </div>
                  </li>

                   <li class="item">
                    <div class="item-media">
                        <img src="../../../images/1513641735.jpg" alt="item Image">
                      <div class="item-desc">
                        <h3>Drill</h3>
                      </div>
                    </div>
                  </li>

                  <li class="item">
                    <div class="item-media">
                        <img src="../../../images/1513641735.jpg" alt="item Image">
                      <div class="item-desc">
                        <h3>Hammer</h3>
                      </div>
                    </div>
                  </li>

                   <li class="item">
                    <div class="item-media">
                        <img src="../../../images/1513641735.jpg" alt="item Image">

                      <div class="item-desc">
                        <h3>Saw</h3>
                      </div>
                    </div>
                  </li>

                   <li class="item">
                    <div class="item-media">
                        <img src="../../../images/1513641735.jpg" alt="item Image">

                      <div class="item-desc">
                        <h3>Drill</h3>
                      </div>
                    </div>
                  </li>

                </ul>
        </div>
    </div>


    <section id="content">

    <div class="section-head">

            <div class="section-title">
                <h2 id="bigTitle">Steps</h2>
                <h5 id="subTitle">Follow these steps to complete this part.</h5>
            </div>

            <div class="top-left">
              <a href="{{ url('/home')}}">
                <img src="../../../images/home-icon.png" width="20px" alt="go home">
                <p>HOME</p>
              </a>
            </div>
    </div>

    <div id="itemBar">
        
        <a href="#" class="itemBarItem" id="Tools">
            <img src="../../../images/tool-icon.png" alt="Tools Icon" class="itemIcon">
            <p>View Tools</p>
        </a>

        <a href="#" class="itemBarItem" id="Fixtures">
            <img src="../../../images/fixture-icon.png" alt="Fixture Icon" class="itemIcon">
            <p>View Fixtures</p>
        </a>

        <a href="#" class="itemBarItem" id="Materials">
            <img src="../../../images/material-icon.png" alt="Material Icon" class="itemIcon">
            <p>View Materials</p>
        </a>

    </div>


    <div id="operations">

        <div class="opItem" data-id="op1">

            <div class="opInfo" id="opInfo1">
                <p class="opItemTitle">Operation 1</p>
                <p class="viewOpImg">View Image</p>
                <p class="viewOpComments">1 Comment</p>
            </div>

            <div class="opOpen" data-id="op1">

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

        <div class="opItem" data-id="op2">

            <div class="opInfo" id="opInfo2">
                <p class="opItemTitle">Operation 2</p>
                <p class="viewOpImg">View Image</p>
                <p class="viewOpComments">3 Comments</p>
            </div>

            <div class="opOpen" data-id="op2">

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
        

        <div class="opItem" data-id="op3">

            <div class="opInfo" id="opInfo3">
                <p class="opItemTitle">Operation 3</p>
                <p class="viewOpImg">View Image</p>
                <p class="viewOpComments">3 Comments</p>
            </div>

            <div class="opOpen" data-id="op3">

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

        <div class="opItem" data-id="op4">

            <div class="opInfo" id="opInfo4">
                <p class="opItemTitle">Operation 4</p>
                <p class="viewOpImg">View Image</p>
                <p class="viewOpComments">5 Comments</p>
            </div>

            <div class="opOpen" data-id="op4">

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


        <script type="text/javascript" src="../../../js/stepsView.js"></script>



@endsection
