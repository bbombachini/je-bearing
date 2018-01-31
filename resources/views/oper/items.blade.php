@extends('layouts.opp-app')

@section('content')



<section id="content">
    <div class="section-head">
            <div class="section-title">
                <h2 id="bigTitle">{{$title}}</h2>
                <h5 id="subTitle">Collect the following {{$name}} in order to complete this part.</h5>
            </div>

            <div class="top-left">
              <a href="{{ url('/searchpart')}}">
                <img src="../../../images/home-icon.png" width="20px" alt="go home">
                <p>HOME</p>
              </a>
            </div>
    </div>
        <div id="oplist">
          <ul class="grid-list">
              @foreach ($items as $item)
                  <li class="item">
                    <div class="item-media">
                      <img src="../../../images/{{ $item['media_path'] }}" alt="{{ $item->name }} image">

                      <div class="item-desc">
                        <h3>{{$item->name}}</h3>
                        <h4># {{$item->number}}</h4>
                      </div>
                    </div>
                  </li>
              @endforeach
          </ul>
          <div id="pagination-container">
                {{ $items->links() }}
          </div>
        </div>
</section>
@endsection
