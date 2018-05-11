<!doctype html>
<html @php(language_attributes())>
  @include('partials.head')
  <body @php(body_class())>
    @php(do_action('get_header'))
    @include('partials.header')
    @include('partials.jumbotron')
    <section class="section">
      <div class="wrap container" role="document">
        <div class="content">
          <main class="main">
            @yield('content')
          </main>
          @if (App\display_sidebar())
            <aside class="sidebar">
              @if (is_page_template( 'views/template-documentos.blade.php' ))
                @include('partials.sidebar.documentos')
              @else
                @include('partials.sidebar')
              @endif
            </aside>
          @endif
        </div>
      </div>
    </section>
    @php(do_action('get_footer'))
    @include('partials.footer')
    @php(wp_footer())
  </body>
</html>
