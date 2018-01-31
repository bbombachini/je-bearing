@extends('layouts.admin-app')

@section('content')



<section id="content">
    <div class="section-head">
            <div class="section-title">
                <h2 id="bigTitle">Tooling</h2>
                <h5 id="subTitle">Collect the following tools in order to complete this part.</h5>
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
              @foreach ($tools as $tool)
                  <li class="item">
                    <div class="item-media">
                      <img src="../../../images/{{ $tool['media_path'] }}" alt="{{ $tool->tool_name }} image">

                      <div class="item-desc">
                        <h3>{{$tool->tool_name}}</h3>
                        <h4># {{$tool->tool_number}}</h4>
                      </div>
                    </div>
                  </li>
              @endforeach
          </ul>
          <div id="pagination-container">
                {{ $tools->links() }}
          </div>
        </div>
</section>
@endsection
