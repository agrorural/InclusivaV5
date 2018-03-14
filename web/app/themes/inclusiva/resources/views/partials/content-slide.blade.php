@foreach (App::Banner() as $slide)
  <div class="swiper-slide" style="background-image:url( {{ the_post_thumbnail_url( 'full' ) }} )">
    <img src="{{ the_post_thumbnail_url( 'full' ) }}" class="entity-img" />
    <div class="content">
      <h3 class="title" data-swiper-parallax="-30%" data-swiper-parallax-scale=".7">{{ get_the_title() }}</h3>
      <span class="caption" data-swiper-parallax="-20%">
        @php(the_content())
      </span>
    </div>
  </div>
@endforeach