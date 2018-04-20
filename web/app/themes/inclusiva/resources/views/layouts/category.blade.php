<!doctype html>
<html @php(language_attributes())>
  @include('partials.head')
  
  <body @php(body_class())>
    @php(do_action('get_header'))
    @include('partials.header')
    @include('partials.jumbotron')
    
    <section id="categoryContent" class="container-boxed section">
      <div class="container">
        @yield('content-category')
      </div>
    </section>

    <div class="wrap container" role="document">
      <div class="content">
        <main class="main">
          @yield('content')
        </main>
        <aside class="sidebar">
          @include('partials.sidebar.category')
        </aside>
      </div>
    </div>

    @php(do_action('get_footer'))
    @include('partials.footer')
    @php(wp_footer())
  </body>
</html>