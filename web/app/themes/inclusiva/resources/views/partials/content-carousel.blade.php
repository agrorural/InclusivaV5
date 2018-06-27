@php
  $the_post_type = get_post_type( get_the_ID() );
  $format = get_post_format(get_the_ID());

  if ( $the_post_type && $the_post_type === 'servicios' ) {
    $service__icon = get_field('servicio__icon');
    
    if($count){
      switch ($count) {
        case 1:
          $slide_class="bg-lavender-200";
          break;
        case 2:
          $slide_class="bg-purple-200";
          break;
        case 3:
          $slide_class="bg-red";
          break;
        case 4:
          $slide_class="bg-orange-300";
          break;
        default:
          # code...
          break;
      }
    }
    //var_dump($service__icon);
  }
@endphp

@if ( $the_post_type && $the_post_type === 'servicios' )
  <article @php(post_class('swiper-slide services-slide card ' . $slide_class ))>
@else
<article @php(post_class('swiper-slide card' ))>
@endif
  
  @if ( has_post_thumbnail() && $the_post_type !== 'servicios' )
    <img src="{{ the_post_thumbnail_url( 'full' ) }}" class="card-img-top" />
  @endif

  @if ( $the_post_type === 'servicios' )
    <div class="card-body entry-body">
      <header>
        <img src="{{ $service__icon }}" alt="" class="style-svg">
        
        <h2 class="card-title entry-title">
          @if ( $the_post_type === 'servicios' )
          
            @php( $url = (get_field('servicio__url')) ? get_field('servicio__url') : get_the_permalink() )
            <a class="slide-link" href="{!! $url !!}">
          @else
            <a class="slide-link" href="{{ get_permalink() }}">
          @endif
            {{ get_the_title() }}
          </a>
        </h2>
      </header>
      <div class="entry-summary">
        @php(the_excerpt())
      </div>
    </div>
  @else
    <div class="card-body entry-body">
      <header>
        <h2 class="card-title entry-title">
          @if ( $the_post_type === 'servicios' )
            @php( $url = (get_field('servicio__url')) ? get_field('servicio__url') : get_the_permalink() )
            <a class="slide-link" href="{!! $url !!}">
          @else
            <a class="slide-link" href="{{ get_permalink() }}">
          @endif
            {{ get_the_title() }}
          </a>
        </h2>
      </header>
      <div class="entry-summary">
        @php(the_excerpt())
      </div>
    </div>
  @endif

  @if ( $the_post_type === 'servicios' )
    <div class="card-footer entry-footer">
      <a class="slide-footer-link" href="{!! $url !!}">Ver servicio</a>
    </div>
  @endif
</article>