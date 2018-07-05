<div class="page-header">
  @if ( is_category() )
    <div class="headerIcon">
      <header>
        <picture>
          <img src="{{$flag['url']}}" width="55" alt="{{$flag['title']}}">
        </picture>
        <h1>{!! App::title() !!}</h1>
      </header>
      <footer>
          @if($agency && $agency > 0) <strong>{!! $agency !!}</strong>@endif
      </footer>
    </div>
  @else
    <h1>{!! App::title() !!}</h1>
  @endif
  {!! App::description() !!}
</div>
{{-- @debug
@php(var_dump($flag)) --}}