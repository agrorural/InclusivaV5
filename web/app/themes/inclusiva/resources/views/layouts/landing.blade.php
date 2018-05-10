<!doctype html>
<html @php(language_attributes())>
  @include('partials.head.landing')
  <body @php(body_class($color))>
    @php(do_action('get_header'))
    @include('partials.header')
    @include('partials.jumbotron.landing')
    {{-- @debug --}}
    @if( !$is_front )
      <div class="wrap container" role="document">
        <div class="content">
          <main class="main">
            @yield('content')
          </main>
          @if (App\display_sidebar())
            <aside class="sidebar">
                @include('partials.sidebar')
            </aside>
          @endif
        </div>
      </div>
    @endif
    
    @if ( $has_feed )
      <div class="container" role="document">
        @yield('content-feed')
      </div>
    @endif

    @if ( $has_banners )
      <div class="container" role="document">
        @yield('content-banners')
      </div>
    @endif

    @if ( $has_videos )
      <div class="container" role="document">
        @yield('content-videos')
      </div>
    @endif

    @php(do_action('get_footer'))
    @include('partials.footer')
    @php(wp_footer())
  </body>
</html>