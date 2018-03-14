@php
  $args  = array(
    'post_type' => 'post', 
    'posts_per_page' => 3,
    'tag__not_in'=>array('47', '196', '150', '494'),
  );
  
  $the_query = new WP_Query( $args );

@endphp

@if($the_query->have_posts())
  <div class="col-lg-8 news">
    <h2 class="section-title">Noticias</h2>
    <div class="row">
      @while ($the_query->have_posts()) @php($the_query->the_post())
        <div class="col-lg-4">
          @include('partials.content-feed')
        </div>
      @endwhile
    </div>
  </div>

  {!! wp_reset_postdata() !!}

@else

  {{ __('Sorry, no results were found.', 'sage') }}

@endif