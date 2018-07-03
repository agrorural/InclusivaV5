@if(is_singular('post'))
  @include('partials/entry-meta')
@else
  @php(dynamic_sidebar('sidebar-primary'))
@endif
