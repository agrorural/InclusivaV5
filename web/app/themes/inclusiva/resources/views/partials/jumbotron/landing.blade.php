<div class="jumbotron jumbotron-fluid container-boxed @if( $slider ) with-slider @endif">
  <div class="jumbotron-container">
    <!-- Swiper -->
    @if( $slider )
      <div id="landing__slider" class="swiper-container">
        <div class="swiper-wrapper">
            @foreach($slider as $key => $value)
              <figure class="swiper-slide" style="background-image: url({!! $value->guid !!})">
                <picture>
                  <img src="{{ the_post_thumbnail_url( 'full' ) }}" alt="{{ get_the_title() }}" class="entity-img" />
                </picture>
                <figcaption class="content entry-body">
                    <div class="media">
                        @if( $logo )
                        <picture>
                          <img class="mr-3" src="{!! $logo !!}" width="124" alt="{!! App::title() !!}" />
                        </picture>
                        @endif
                      <div class="media-body title entry-title">
                        <h1 class="mt-0">{!! App::title() !!}</h1>
                        {!! App::description() !!}
                      </div>
                    </div>
                </figcaption>
              </figure>
            @endforeach
        </div>
        <!-- Add Arrows -->
        <div id="landing-arrow-right" class="swiper-button-next"></div>
        <div id="landing-arrow-left" class="swiper-button-prev"></div>
      </div>
    @else
      @include('partials.page-header')
    @endif
  </div>
</div>


{{-- 
@php(var_dump($logo)) --}}


{{-- @debug --}}



