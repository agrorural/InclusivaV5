<article @php(post_class())>
    <figure class="entry-img">
  
      {!! App::share() !!}

      <a href="{{ get_permalink() }}">
        <picture>
          @if( has_post_thumbnail() )
            @php (the_post_thumbnail('content-thumb', array( 'class' => 'img-fluid' )))
          @else
            <img src="@asset('images/content--featured--default.jpg')" class="img-fluid" />
          @endif
        </picture>
      </a>
    </figure>

  <div class="entry-body">
    <header>
    <h4 class="entry-title"><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h4>
    S/ {{Product::info()->price}} x {{Product::info()->pres}}
    </header>
  </div>
</article>
