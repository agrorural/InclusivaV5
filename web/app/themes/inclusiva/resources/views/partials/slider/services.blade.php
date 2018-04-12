@php
  $args  = array(
    'post_type' => 'servicios', 
    'condiciones' => 'serviagro',
    'orderby' => 'title',
	  'order'   => 'ASC',
    'posts_per_page' => -1,
  );
  
  $services_query = new WP_Query( $args );

@endphp

@if($services_query->have_posts())
  <div id="services__slider" class="swiper-container">
    <div class="swiper-wrapper">
      

        @while ($services_query->have_posts()) @php($services_query->the_post())
      
          @include('partials.content-carousel')
      
        @endwhile

    </div>
  </div>
  {!! wp_reset_postdata() !!}

@else

  {{ __('Sorry, no results were found.', 'sage') }}

@endif
