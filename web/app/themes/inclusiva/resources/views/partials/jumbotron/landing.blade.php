<div class="jumbotron jumbotron-fluid container-boxed with-{!! $header_type->is !!} @if( $has_menu->is !== false ) with-menu @endif"  @if( $header_type->is === 'thumbnail' ) style="background-image: url({!! $header_type->item !!})" @endif>
<div class="jumbotron-container">
    @if( $header_type->is === 'slider' )
      <div id="landing__slider" class="swiper-container">
        <div class="swiper-wrapper">
            @foreach($header_type->items as $key => $value)
              <figure class="swiper-slide" style="background-image: url({!! $value->guid !!})">
                <picture>
                  <img src="{{ the_post_thumbnail_url( 'full' ) }}" alt="{{ get_the_title() }}" class="entity-img" />
                </picture>
              </figure>
            @endforeach
        </div>
        <!-- Add Arrows -->
        <div id="landing-arrow-right" class="swiper-button-next"></div>
        <div id="landing-arrow-left" class="swiper-button-prev"></div>
      </div>
    @endif
    
    @include('partials.page-header.landing')
  </div>
</div>

@if( $has_menu->is !== false )
  @if ( has_nav_menu( $has_menu->menu . '_navigation' ) )
    <nav id="landingNav" class="container-boxed navbar navbar-expand-md navbar-light bg-light nav">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <?php
          wp_nav_menu( array(
            'theme_location'    => $has_menu->menu . '_navigation',
            'depth'             => 0,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse',
            'container_id'      => 'bs-example-navbar-collapse-1',
            'menu_class'        => 'nav navbar-nav d-flex justify-content-between',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker(),
          ) );
        ?>
    </nav>
  @endif
    
@endif

{{-- @debug
--}}
{{-- @php(var_dump( $has_menu ))  --}}