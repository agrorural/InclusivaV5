@php
  $args  = array(
    'post_type' => 'Banners', 
    'posiciones' => 'Slider Home',
    'posts_per_page' => 5
  );
  
  $the_query = new WP_Query( $args );

@endphp

@if($the_query->have_posts())
  <section id="home__slider" class="swiper-container loading">
    <div class="swiper-wrapper">
  
      @while ($the_query->have_posts()) @php($the_query->the_post())

        @include('partials.content-slide')
      
      @endwhile

    </div>
    <div class="swiper-pagination"></div>

    <div class="swiper-button-prev swiper-button-white"></div>
    <div class="swiper-button-next swiper-button-white"></div>
  </section>

  {!! wp_reset_postdata() !!}
@else

  {{ __('Sorry, no results were found.', 'sage') }}

@endif
