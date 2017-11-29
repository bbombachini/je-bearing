@include('partials.head')

        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    <!-- <h1></h1> -->
                    @foreach ($tools as $tool)
                      <h1>This is tool {{$tool->tool_name}}</h1>
                      <p>{{$tool->tool_desc}}</p>
                    @endforeach
                </div>
            </div>
        </div>


@include('partials.footer')

