<!doctype html>
<html @php(language_attributes())>
  @include('partials.head')
  <body @php(body_class())>
    @php(do_action('get_header'))
    @include('partials.header')
    @include('partials.section.featured')
    {{-- @include('partials.section.la-institucion') --}}
    @include('partials.section.services')
    @include('partials.section.newsfeed')
    @include('partials.section.directions')
    @include('partials.section.social')
    @include('partials.section.multimedia')

    @php(do_action('get_footer'))
    @include('partials.footer')
    @php(wp_footer())
  </body>
</html>
