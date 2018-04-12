@php
  $args  = array(
    'post_type' => 'Banners', 
    'posiciones' => 'Links',
    'posts_per_page' => -1
  );
  
  $links_query = new WP_Query( $args );

@endphp

@if($links_query->have_posts())
  <div id="links__slider" class="swiper-container loading">
    <div class="swiper-wrapper">
  
      @while ($links_query->have_posts()) @php($links_query->the_post())

        @include('partials.content-slide')
      
      @endwhile

    </div>

    <div id="links-arrow-left" class="swiper-button-prev swiper-button-white"></div>
    <div id="links-arrow-right" class="swiper-button-next swiper-button-white"></div>
  </div>

  {!! wp_reset_postdata() !!}
@else

  {{ __('Sorry, no results were found.', 'sage') }}

@endif