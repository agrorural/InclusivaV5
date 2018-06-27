@php
  $args  = array(
    'post_type' => 'Banners', 
    'posiciones' => 'Slider Home',
    'posts_per_page' => 5
  );
  
  $home_query = new WP_Query( $args );

@endphp

@if($home_query->have_posts())
  <div id="home__slider" class="swiper-container loading">
    <div class="swiper-wrapper">
  
      @while ($home_query->have_posts()) @php($home_query->the_post())

        @include('partials.content-slide')
      
      @endwhile

    </div>
    {{-- <div id="home-pagination" class="swiper-pagination"></div> --}}

  </div>
  
  <div id="home-arrow-left" class="swiper-button-prev"><i class="fas fa-arrow-left"></i></div>
  <div id="home-arrow-right" class="swiper-button-next"><i class="fas fa-arrow-right"></i></div>
  
  {!! wp_reset_postdata() !!}
@else

  {{ __('Sorry, no results were found.', 'sage') }}

@endif
