<footer class="content-info">
  @if(is_front_page())
    @include('partials.section.footer-pre')
  @endif
  @include('partials.section.footer')
  @include('partials.section.footer-post')
</footer>

{!! App::follow() !!}