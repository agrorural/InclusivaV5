@php
  $the_post_type = get_post_type( get_the_ID() );
  $format = get_post_format(get_the_ID());
  $is_home_slider = has_term( "slider-home", "posiciones" );
@endphp

@if ( $the_post_type == "banners" )
  @foreach (App::Banner() as $slide)
    @if ($slide['is_text'])
      <figure @php(post_class("swiper-slide")) data-test-set="test" style="background-image:url( {{ has_post_thumbnail() ? the_post_thumbnail_url( 'full' ) : App\asset_path('images/slide--default.jpg') }} )">
        <img src="{{ has_post_thumbnail() ? the_post_thumbnail_url( 'full' ) : App\asset_path('images/slide--default.jpg') }}" alt="{{ get_the_title() }}" class="entity-img" />
        <figcaption class="content">
          <h2 class="title">{{ get_the_title() }}</h2>
          @if ( $the_post_type == "banners" )
              <span class="caption">
                @php(the_content())
              </span>
            @else
              <time class="caption">
                {{ get_the_date() }}
              </time>
            @endif
        </figcaption>
      </figure>
      {{-- <figure @php(post_class("swiper-slide")) style="background-image:url( {{ has_post_thumbnail() ? the_post_thumbnail_url( 'full' ) : App\asset_path('images/slide--default.jpg') }} )">
        <picture>
          <img src="{{ has_post_thumbnail() ? the_post_thumbnail_url( 'full' ) : App\asset_path('images/slide--default.jpg') }}" alt="{{ get_the_title() }}" class="entity-img" />
        </picture>

        <figcaption class="content  entry-body">
          <header>
            <h3 class="title entry-title" data-swiper-parallax="-30%" data-swiper-parallax-scale=".7">
              <a class="slide-link" href="{{ get_permalink() }}">
                {{ get_the_title() }}
              </a>
            </h3>
          </header>
          <div class="entry-summary">
            @if ( $the_post_type == "banners" )
              <span class="caption" data-swiper-parallax="-20%">
                @php(the_content())
              </span>
            @else
              <time class="caption" data-swiper-parallax="-20%">
                {{ get_the_date() }}
              </time>
            @endif
          </div>
          
        </figcaption>
      </figure> --}}
    @else
      <figure @php(post_class("swiper-slide"))>
        <picture>
          @if ($slide['url'])
            <a class="slide-link" href="{{ $slide['url'] }}">
              <img src="{{ has_post_thumbnail() ? the_post_thumbnail_url( 'featured-thumb', array( 'class' => 'img-fluid' ) ) : App\asset_path('images/slide--default.jpg') }}" alt="{{ get_the_title() }}" class="img-fluid" />
            </a>
          @else
            <img src="{{ has_post_thumbnail() ? the_post_thumbnail_url( 'full' ) : App\asset_path('images/slide--default.jpg') }}" alt="{{ get_the_title() }}" class="img-fluid" />
          @endif
        </picture>
      </figure>
    @endif
  @endforeach
@else
  <figure @php(post_class("swiper-slide")) style="background-image:url( {{ the_post_thumbnail_url( 'full' ) }} )">
    @if ( $format )
      <span class="fa-layers fa-fw fa-3x format">
        <i class="fas fa-circle data-fa-transform="shrink-6""></i>
          @if ( $format == "gallery" )
            <i class="fa-inverse fas fa-camera fa-sm" data-fa-transform="shrink-6"></i>
          @elseif ( $format == "video" )
            <i class="fa-inverse fas fa-video fa-sm" data-fa-transform="shrink-6"></i>
          @endif
      </span>
    @endif
    <picture>
      <img src="{{ the_post_thumbnail_url( 'full' ) }}" alt="{{ get_the_title() }}" class="entity-img" />
    </picture>
    <figcaption class="content entry-body">
      <header>
        <h3 class="title entry-title" data-swiper-parallax="-30%" data-swiper-parallax-scale=".7">
          <a class="slide-link" href="{{ get_permalink() }}">
            {{ get_the_title() }}
          </a>
        </h3>
      </header>
      <div class="entry-summary">
        @if ( $the_post_type == "banners" )
          <span class="caption" data-swiper-parallax="-20%">
            @php(the_content())
          </span>
        @else
          <time class="caption" data-swiper-parallax="-20%">
            {{ get_the_date() }}
          </time>
        @endif
      </div>
      
    </figcaption>
  </figure>
@endif