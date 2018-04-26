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
    <div id="home-pagination" class="swiper-pagination"></div>

    <div id="home-arrow-left" class="swiper-button-prev swiper-button-white"></div>
    <div id="home-arrow-right" class="swiper-button-next swiper-button-white"></div>
  </div>

  {!! wp_reset_postdata() !!}
@else

  {{ __('Sorry, no results were found.', 'sage') }}

@endif
{{-- 
<section id="home__slider" class="swiper-container loading">
  <div class="swiper-wrapper">
    <div class="swiper-slide" data-test-set="test" style="background-image:url(https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLbVhsNzdIYmlfN1E)">
      <img src="https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLbVhsNzdIYmlfN1E" class="entity-img" />
      <div class="content">
        <p class="title">Shaun Matthews</p>
        <span class="caption">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>
      </div>
    </div>
    <div class="swiper-slide" style="background-image:url(https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLWTdaX3J5b1VueDg)">
      <img src="https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLWTdaX3J5b1VueDg" class="entity-img" />
      <div class="content">
        <p class="title">Alexis Berry</p>
        <span class="caption">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>
      </div>
    </div>
    <div class="swiper-slide" style="background-image:url(https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLRml1b3B6eXVqQ2s)">
      <img src="https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLRml1b3B6eXVqQ2s" class="entity-img" />
      <div class="content">
        <p class="title">Billie	Pierce</p>
        <span class="caption"　>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>
      </div>
    </div>
    <div class="swiper-slide" style="background-image:url(https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLVUpEems2ZXpHYVk)">
      <img src="https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLVUpEems2ZXpHYVk" class="entity-img" />
      <div class="content">
        <p class="title">Trevor	Copeland</p>
        <span class="caption">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>
      </div>
    </div>
    <div class="swiper-slide" style="background-image:url(https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLNXBIcEdOUFVIWmM)">
      <img src="https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLNXBIcEdOUFVIWmM" class="entity-img" />
      <div class="content">
        <p class="title">Bernadette	Newman</p>
        <span class="caption">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>
      </div>
    </div>
  </div>
  
  <!-- If we need pagination -->
  <div class="swiper-pagination"></div>
  <!-- If we need navigation buttons -->
  <div class="swiper-button-prev swiper-button-white"></div>
  <div class="swiper-button-next swiper-button-white"></div>
</section>
 --}}
