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
            <p class="commentBody">Follow these instructions along with the image below to properly comlete this step. Then scroll down to the next step.</p>
            
        </div>

        <div class="commentItem">
            <h3 class=commentAuth>Jane Smith</h3>
            <p class="commentDate">Jan 5, 2018</p>
            <p class="commentBody">This is the Alert descriotion. Follow these instructions along with the image below to properly comlete this step. Then scroll down to the next step.</p>
            
        </div>

        <div class="commentItem">
            <h3 class=commentAuth>Mary John</h3>
            <p class="commentDate">Jan 5, 2018</p>
            <p class="commentBody">Follow these instructions along with the image below to properly comlete this step. Then scroll down to the next step.</p>
            
        </div>

        <div class="commentItem">
            <h3 class=commentAuth>Albert Foster</h3>
            <p class="commentDate">Jan 5, 2018</p>
            <p class="commentBody">This is the Alert descriotion. Below to properly comlete this step. Then scroll down to the next step.</p>
            
        </div>

        <div class="commentItem">
            <h3 class=commentAuth>Sarah Parker</h3>
            <p class="commentDate">Jan 5, 2018</p>
            <p class="commentBody">This is the Alert descriotion.</p>
            
        </div>
    </div>

    <div id="commentForm">
        <fieldset class="contactLabel">
            <p>{!! Form::label('Comment') !!}</p>
            {!! Form::textarea('desc', '', ['class' => 'contactInputMessage', 'size' => '50x10']) !!}
        </fieldset>

        <button type="submit" class="green-button" name="button">SUBMIT</button>

    </div>

    

</section>


@endsection
