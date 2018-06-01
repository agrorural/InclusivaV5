@php
  $the_post_type = get_post_type( get_the_ID() );
  $format = get_post_format(get_the_ID());
@endphp

<article class="swiper-slide card">
  
  @if ( has_post_thumbnail() )
    <img src="{{ the_post_thumbnail_url( 'full' ) }}" class="card-img-top" />
  @endif

  <div class="card-body entry-body">
    <header>
      <h2 class="card-title entry-title">
        @if ( $the_post_type === 'servicios' )
        
          @php( $url = (get_field('servicio__url')) ? get_field('servicio__url') : get_the_permalink() )
          <a href="{!! $url !!}">
        @else
          <a href="{{ get_permalink() }}">
        @endif
          {{ get_the_title() }}
        </a>
      </h2>
    </header>
    @if ( !$the_post_type === 'servicios' )
      <div class="entry-summary">
        @php(the_excerpt())
      </div>
    @endif
  </div>
</article>