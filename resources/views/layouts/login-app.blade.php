  @include('partials.head')
  <!-- CONTENT STARTS HERE -->

  <div id="container-login">
      <section id="welcome-con">

        @yield('admin-login')

      
        @yield('message')
        

        @yield('login')
        

      </section>

      @yield('content')

  @include('partials.footer')
