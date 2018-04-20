@extends('layouts.opp-app')

@section('content')

    <div id="itemLibraryCon">
         <div id="libraryHeader">
            <h3>Tools for Part #123</h3>
           <h2 id="xButt">X</h2>
        </div>

        <!-- Hard coded fixtures/materials/tools library just for demonstration purposes -->
        <div id="itemLibrary">

                <ul class="grid-list">

                  <li class="item">
                    <div class="item-media">
                        <img src="/images/1521033723.jpg" alt="item Image">
                      <div class="item-desc">
                        <h3>Hammer</h3>
                      </div>
                    </div>
                  </li>

                   <li class="item">
                    <div class="item-media">
                        <img src="/images/1521033761.jpg" alt="item Image">
                      <div class="item-desc">
                        <h3>Saw</h3>
                      </div>
                    </div>
                  </li>

                   <li class="item">
                    <div class="item-media">
                        <img src="/images/1521033610.jpg" alt="item Image">
                      <div class="item-desc">
                        <h3>Drill</h3>
                      </div>
                    </div>
                  </li>

                  <li class="item">
                    <div class="item-media">
                        <!-- <img src="/images/1520955235.jpg" alt="item Image"> -->
                      <div class="item-desc">
                        <h3>Screwdriver</h3>
                      </div>
                    </div>
                  </li>

                   <li class="item">
                    <div class="item-media">
                        <img src="/images/1521033748.jpg" alt="item Image">

                      <div class="item-desc">
                        <h3>Sandpaper</h3>
                      </div>
                    </div>
                  </li>

                </ul>
        </div>
    </div>


    <section id="stepContent">
    <div class="section-head">
            <div class="section-title">
                <h2 id="bigTitle">Steps</h2>
                <h5 id="subTitle">Follow these steps to complete this part.</h5>
            </div>
    </div>

    <div id="fixHeight">
      <div id="itemBar">
          <a href="#" class="itemBarItem" id="Tools">
              <img src="/images/tool-icon.png" alt="Tools Icon" class="itemIcon">
              <p>View Tools</p>
          </a>
          <a href="#" class="itemBarItem" id="Fixtures">
              <img src="/images/fixture-icon.png" alt="Fixture Icon" class="itemIcon">
              <p>View Fixtures</p>
          </a>
          <a href="#" class="itemBarItem" id="Materials">
              <img src="/images/material-icon.png" alt="Material Icon" class="itemIcon">
              <p>View Materials</p>
          </a>
      </div>
    </div>

    <div id="operations">

      @foreach ($operations as $operation)
      <div class="opItem" data-id="{{$operation->id}}">
          <div class="opInfo" id="opInfo1">
              <p class="opItemTitle">{{$operation->title}}</p>
              <!-- Comments will be added in later implementation -->
              <!-- <p class="viewOpComments">1 Comment</p> -->
          </div>

            <div class="opOpen" data-id="{{$operation->id}}">
                <div id="steps">
                  @foreach ($operation->steps as $step)
                    <div class="stepItem">
                      <p class=stepTitle>{{$step->title}}</p>
                      <p class="stepDesc">{{$step->desc}}</p>
                    </div>
                    <!-- Loop inside array of matches between steps and media to check if there's related images with it -->
                    @foreach ($matchMedia as $match)
                      <!-- For each matching array check if the step id of the array matches the id of the step -->
                      @foreach($match as $compare)
                        @if($compare->step_id === $step->id)
                          <!-- If so, for each media inside the array of media, print the ones that the id matches the id's in the array -->
                          @foreach($media as $img)
                            @if($img->id === $compare->media_id)
                            <img src="/images/{{$img->path}}" alt="step Image">
                            @endif
                          @endforeach
                        @endif
                      @endforeach
                    @endforeach
                  @endforeach


                </div>
            </div>
      </div>
      @endforeach



    <!-- Later implementation of image gallery on steps - Here's an example of a hard coded operation/steps with code for gallery.js that's also commmented out and style -->
        <!-- <div class="opItem" data-id="op1">
            <div class="opInfo" id="opInfo1">
                <p class="opItemTitle">Operation One</p>
                <p class="viewOpImg">View Image</p>
                <p class="viewOpComments">1 Comment</p>
            </div>
            <div class="opOpen" data-id="op1">
                <div id="steps">
                    <div class="stepItem">
                        <p class=stepTitle>1.1: Cut Materials</p>
                        <p class="stepDesc">Cut the following pieces of wood:</p>
                        <ul>
                            <li>1 ¾" plywood @ 18 ¾" x 61" (top)</li>
                            <li>1 ¾" plywood @ 15" x 56 ½" (base shelf)</li>
                            <li>4 2×2 @ 56 ½" (front and back supports)</li>
                            <li>4 2×2 @ 15" (side supports)</li>
                            <li>4 2×2 @ 17" (legs)</li>
                            <li>6 2×2 @ 12" (center supports)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> -->
<!--
        <div class="opItem" data-id="op2">
            <div class="opInfo" id="opInfo2">
                <p class="opItemTitle">Operation Two</p>
                <p class="viewOpImg">View Image</p>
                <p class="viewOpComments">3 Comments</p>
            </div>
            <div class="opOpen" data-id="op2">
                <div id="steps">

                    <div class="stepItem">
                        <h3 class=stepTitle>2.1: Image Gallery</h3>
                        <p class="stepDesc">Attach top to frame using wood glue and pre-drilled countersink holes. Use 2" wood screws from underside.
                        <p class="stepNote"><span class="yellow">Note:</span> Let the top overhang on front and both sides by 3⁄4".</p>
                        <p class="stepCap"><span class="green">Image 1 of 5 :</span> Put the piece on the other piece.</p>

                        <div class="gallery">
                        <p class="stepCap">Image 1 of 1:</p>
                        <img src="../../images/steptwo.jpg" alt="step Image" class="stepImage">
                        <h5 id="prevMediaButt">PREV</h5>
                        <h5 id="nextMediaButt">NEXT</h5>
                        </div>
                    </div>

                </div>
            </div>
        </div> -->

        <!-- <div class="opItem" data-id="op3">
            <div class="opInfo" id="opInfo3">
                <p class="opItemTitle">Operation Three</p>
                <p class="viewOpImg">View Image</p>
                <p class="viewOpComments">3 Comments</p>
            </div>
            <div class="opOpen" data-id="op3">
                <div id="steps">

                    <div class="stepItem">
                        <p class=stepTitle>3.1: Paint</p>
                        <p class="stepDesc">Paint bench your favorite color. Then leave to dry.</p>
                        <p class="stepNote"><span class="yellow">Note:</span> Sand bench before painting for best results</p>
                        <p class="stepCap"><span class="green">Image 1 of 5 :</span> Put the piece on the other piece.</p>

                    </div>
                </div>
            </div>
        </div> -->

        <!-- <div class="opItem" data-id="op4">
            <div class="opInfo" id="opInfo4">
                <p class="opItemTitle">Operation Four</p>
                <p class="viewOpImg">View Image</p>
                <p class="viewOpComments">3 Comments</p>
            </div>
            <div class="opOpen" data-id="op4">
                <div id="steps">
                    <div class="stepItem">
                        <p class=stepTitle>4.1 Insert Wood Crates</p>
                        <p class="stepDesc">Insert wooden crates or baskets into 4 slots.</p>
                        <p class="stepNote"><span class="yellow">Note:</span> Add Felt tips on the bottom of boxes or baskets for best sliding effect.</p>
                        <img src="../../images/benchwithboxes.jpg" alt="step Image" class="stepImage">

                    </div>
                    <div class="stepItem">
                        <h3 class=stepTitle>4.2: Decorate with pillows as see fit (optional)</h3>
                        <p class="stepDesc">This is the final step! Congratulations on completing your bench!</p>
                        <img src="../../images/final.jpg" alt="step Image" class="stepImage">
                    </div>
                </div>
            </div>
        </div> -->

    </div>
</section>
        <script type="text/javascript" src="/js/stepsView.js"></script>
        <!-- <script type="text/javascript" src="/js/gallery.js"></script> -->




@endsection
