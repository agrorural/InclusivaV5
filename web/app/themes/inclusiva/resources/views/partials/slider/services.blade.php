@php
  $args  = array(
    'post_type' => 'servicios', 
    'condiciones' => 'serviagro',
    'orderby' => 'title',
	  'order'   => 'ASC',
    'posts_per_page' => -1,
  );

  $services_query = new WP_Query( $args );

  $count = 0;

@endphp

@if($services_query->have_posts())
  <div id="services__slider" class="swiper-container">
    <div class="swiper-wrapper">
      

        @while ($services_query->have_posts()) @php($services_query->the_post())
          @php($count++)
          
          @include('partials.content-carousel')

          @if ($count === 4)
            @php($count = 0)
          @endif

        @endwhile

    </div>
    
    <!-- Add Arrows -->
    {{-- <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div> --}}
  </div>

  <!-- Add Pagination -->
  <div id="services-pagination" class="swiper-pagination"></div>
  {!! wp_reset_postdata() !!}

@else

  {{ __('Sorry, no results were found.', 'sage') }}

@endif
