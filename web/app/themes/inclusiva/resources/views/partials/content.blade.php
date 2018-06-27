@php
  $categories = get_the_category();
  $format = get_post_format(get_the_ID());
@endphp

<article @php(post_class())>
    <figure class="entry-img">
      @if ( $format )
        <nav class="entry-type">
          <a href="{{ get_permalink() }}">
            <span class="fa-stack fa-2x">
                <i class="fas fa-circle fa-stack-2x"></i>
                @if ( $format == "gallery" )
                  <i class="fas fa-camera fa-stack-1x fa-inverse"></i>
                @elseif ( $format == "video" )
                  <i class="fas fa-play fa-stack-1x fa-inverse"></i>
                @elseif ( $format == "aside" )
                <i class="fas fa-bookmark fa-stack-1x fa-inverse"></i>
                @endif
            </span>
          </a>
        </nav>
      @endif
  
      {!! App::share() !!}

      <a href="{{ get_permalink() }}">
        <picture>
          @if( has_post_thumbnail() )
            @php (the_post_thumbnail('content-thumb', array( 'class' => 'img-fluid' )))
          @else
            <img src="@asset('images/content--featured--default.jpg')" class="img-fluid" />
          @endif
        </picture>
      </a>
    </figure>

  <div class="entry-body">
    <header>
      <h4 class="entry-title"><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h4>
      
      @if( ! empty( $categories ) )
        <h6 class="entry-category">
            <a href="{!! get_category_link( $categories[0]->term_id ) !!}">{!!  $categories[0]->name !!}</a>
        </h6>   
      @endif
      
      @include('partials/entry-meta-feed')
    </header>
  </div>
</article>
