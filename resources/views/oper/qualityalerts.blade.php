@extends('layouts.opp-app')

@section('content')

    <section id="content">
    <div class="section-head">

            <div class="section-title">
                <h2 id="bigTitle">Quality Alerts</h2>
                <h5 id="subTitle">Keep an eye on the following items.</h5>
            </div>
    </div>

    <div>
        <p id="alertDesc">Minim pariatur est ut pariatur sit velit ut laboris nostrud dolore velit qui velit ut ullamco. Labore do veniam quis velit cillum esse irure ad sunt elit consectetur id pariatur eiusmod eu dolor dolore sit et magna ut in aliquip anim ex dolore velit occaecat cillum.</p>
    </div>


    <div id="goodExampleDiv">
        <h3>GOOD EXAMPLES</h3>

        <div class="alertImg"></div>
        <div class="alertImg"></div>
        <div class="alertImg"></div>
        <div class="alertImg"></div>
    </div>

    <div id="badExampleDiv">
        <h3>BAD EXAMPLES</h3>
        <div class="alertImg"><h1>X</h1></div>
        <div class="alertImg"><h1>X</h1></div>
        <div class="alertImg"><h1>X</h1></div>
        <div class="alertImg"><h1>X</h1></div>
    </div>

</section>


@endsection
