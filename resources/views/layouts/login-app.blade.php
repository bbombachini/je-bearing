  @include('partials.head')
  <!-- CONTENT STARTS HERE -->

  <div id="container-login">
      <section id="welcome-con">


        <div id="welcome-text">
          @yield('message')
        </div>


        @yield('login')
        

      </section>


      @yield('content')
      


  @include('partials.footer')
