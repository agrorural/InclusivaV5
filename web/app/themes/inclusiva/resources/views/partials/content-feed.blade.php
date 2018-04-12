@php
  $categories = get_the_category();
  $format = get_post_format(get_the_ID());
  {{--
    echo '<pre>';
    var_dump($format);
    echo '</pre>';  
  --}}
@endphp

<article @php(post_class())>
  @if ( has_post_thumbnail() )
    <figure class="entry-img">
      <a href="{{ get_permalink() }}">
        @if ( $format )
        <span class="fa-layers fa-fw fa-lg">
          <i class="fas fa-circle data-fa-transform="shrink-6""></i>
          @if ( $format == "gallery" )
            <i class="fa-inverse fas fa-camera fa-sm" data-fa-transform="shrink-6"></i>
          @elseif ( $format == "video" )
            <i class="fa-inverse fas fa-video fa-sm" data-fa-transform="shrink-6"></i>
          @endif
        </span>
        @endif
        <picture>
          {!! the_post_thumbnail('feed-thumb', array( 'class' => 'img-fluid' )) !!}
        </picture>
      </a>
    </figure>
  @endif
  <div class="entry-body">
    <header>
      @if( ! empty( $categories ) )
        <h6 class="entry-category"><a href="{!! get_category_link( $categories[0]->term_id ) !!}">{!!  $categories[0]->name !!}</a></h6>   
      @endif

      <h4 class="entry-title"><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h4>
    </header>
    <div class="entry-summary">
      @include('partials/entry-meta-feed')
    </div>
  </div>
</article>
