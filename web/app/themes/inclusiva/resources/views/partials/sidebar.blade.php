@if(is_singular('post'))
  @include('partials/entry-meta')

  {!! App::share() !!}
@else
  @php(dynamic_sidebar('sidebar-primary'))
@endif
