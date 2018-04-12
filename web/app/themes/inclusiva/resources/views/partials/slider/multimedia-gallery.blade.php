@php
$args = array(
		'post_type' => 'post',
		'tax_query' => array(
			array(
				'taxonomy' => 'post_format',
				'field'    => 'slug',
				'terms'    => array( 'post-format-gallery' ),
			)
		),
		'posts_per_page' => 5
  );
  
  $gallery_query = new WP_Query( $args );

@endphp

@if($gallery_query->have_posts())
  <div id="multimedia__gallery__slider" class="swiper-container loading">
    <div class="swiper-wrapper">
  
      @while ($gallery_query->have_posts()) @php($gallery_query->the_post())

        @include('partials.content-slide')
      
      @endwhile

    </div>

    <div id="gallery-arrow-left" class="swiper-button-prev swiper-button-white"></div>
    <div id="gallery-arrow-right" class="swiper-button-next swiper-button-white"></div>
  </div>

  {!! wp_reset_postdata() !!}
@else

  {{ __('Sorry, no results were found.', 'sage') }}

@endif