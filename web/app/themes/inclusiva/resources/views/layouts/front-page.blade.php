<!doctype html>
<html @php(language_attributes())>
  @include('partials.head')
  <body @php(body_class())>
    @php(do_action('get_header'))
    @include('partials.header')

    @include('partials.slider.front-page')
    @include('partials.section.la-institucion')
    @include('partials.section.newsfeed')
    @include('partials.slider.services')

    @php(do_action('get_footer'))
    @include('partials.footer')
    @php(wp_footer())
  </body>
</html>
