@extends('layouts.opp-app')

@section('content')
    <!-- Dummy hard coded content, to be replaced by real comments -->
    <section id="content">
    <div class="section-head">

            <div class="section-title">
                <h2 id="bigTitle">Quality Alerts</h2>
            </div>
    </div>

    <div>
        <h5 id="descTitle">These are the notes for the part.</h5>
        <p id="alertDesc">Minim pariatur est ut pariatur sit velit ut laboris nostrud dolore velit qui velit ut ullamco. Labore do veniam quis velit cillum esse irure ad sunt elit consectetur id pariatur eiusmod eu dolor dolore sit et magna ut in aliquip anim ex dolore velit occaecat cillum.</p>
    </div>


    <div id="goodExampleDiv">
        <div class="alertImg"></div>
        <div class="alertImg"></div>
        <div class="alertImg"></div>
    </div>

    <div id="badExampleDiv">
        <div class="alertImg"><h1>X</h1></div>
        <div class="alertImg"><h1>X</h1></div>
        <div class="alertImg"><h1>X</h1></div>
    </div>

</section>


@endsection
