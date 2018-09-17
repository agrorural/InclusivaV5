@php
$args = array(
		'post_type' => 'post',
		'tax_query' => array(
			array(
				'taxonomy' => 'post_format',
				'field'    => 'slug',
				'terms'    => array( 'post-format-video' ),
			)
		),
		'posts_per_page' => 1
  );
  
  $video_query = new WP_Query( $args );

@endphp

<div class="col-lg-3 offset-lg-1 events video">
  <h2 class="section-title">Multimedia</h2>
  @if($video_query->have_posts())

        @while ($video_query->have_posts()) @php($video_query->the_post())

            @include('partials.content')
        
        @endwhile

    {!! wp_reset_postdata() !!}

    @else

    {{ __('Sorry, no results were found.', 'sage') }}

    @endif
</div>