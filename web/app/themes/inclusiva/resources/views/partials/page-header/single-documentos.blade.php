<div class="page-header">
  <h1>{!! App::title() !!}</h1>
  <div class="post-meta">
    <div class="post-date">
        <time class="updated" datetime="{{ get_post_time('c', true) }}"><i class="far fa-clock"></i> {{ get_the_date() }}</time>
    </div>
    @if($rde_link)
      <div class="post-comments">
        <a class="btn btn-link btn-sm" href="{{$terms->url}}" target="_blank"><i class="far fa-file-pdf"></i> Descargar</a>
      </div>
    @endif
  </div>
  {{-- @debug
  @php(var_dump($terms)) --}}
</div>