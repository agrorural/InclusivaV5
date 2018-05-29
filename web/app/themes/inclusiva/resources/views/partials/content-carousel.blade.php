<article class="swiper-slide card">
  
  @if ( has_post_thumbnail() )
    <img src="{{ the_post_thumbnail_url( 'full' ) }}" class="card-img-top" />
  @endif

  <div class="card-body entry-body">
    <header>
      <h2 class="card-title entry-title">
        <a href="{{ get_permalink() }}">
          {{ get_the_title() }}
        </a>
      </h2>
    </header>
    {{-- <div class="entry-summary">
      @php(the_excerpt())
    </div> --}}
  </div>
</article>