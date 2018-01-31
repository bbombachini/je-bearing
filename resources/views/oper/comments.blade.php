@extends('layouts.opp-app')

@section('content')

    <section id="content">
    <div class="section-head">

            <div class="section-title">
                <h2 id="bigTitle">Comments</h2>
                <h5 id="subTitle">Read or Write comments about this part.</h5>
            </div>
    </div>


    <div id="comments">
        <div class="commentItem">
            <h3 class=commentAuth>John Doe</h3>
            <p class="commentDate">Jan 5, 2018</p>
            <p class="commentBody">This is the Alert descriotion. Follow these instructions along with the image below to properly comlete this step. Then scroll down to the next step.</p>
            
        </div>

        <div class="commentItem">
            <h3 class=commentAuth>Jane Smith</h3>
            <p class="commentDate">Jan 5, 2018</p>
            <p class="commentBody">This is the Alert descriotion. Follow these instructions along with the image below to properly comlete this step. Then scroll down to the next step.</p>
            
        </div>
    </div>

    <div id="commentForm">
        <label><p>Write a Comment</p></label>
        <input type="text" name="commentField" id="commentField">
        <input id="submitButt" type="submit" name=""></input>
    </div>

    

</section>


@endsection
