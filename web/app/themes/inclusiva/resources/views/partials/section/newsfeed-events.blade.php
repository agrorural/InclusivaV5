
<div class="col-lg-3 offset-lg-1 events">
  <h2 class="section-title">Eventos</h2>
  @php
    global $post;
    
    $events = tribe_get_events( 
      array(
        'eventDisplay' => 'list',
        'posts_per_page' => 1,
      ) 
    );

  @endphp
  
  @if ( $events )
    @foreach ( $events as $post )
      @php ( setup_postdata( $post ) )
      <article class="widget">
        <div class="entry-body">
          <header>
            <time class="entry-date"><a class="slide-link" href="{!! $post->guid !!}">{!! tribe_get_start_date( $post, $display_time = false, $date_format = "j/m" ) !!}</a></time>
          </header>

          <div class="entry-content">
            <h2 class="entry-title"><a class="slide-link" href="{!! $post->guid !!}">{!! $post->post_title !!}</a></h2>
          </div>

          <div class="entry-summary">
            <time class="entry-date">{!! tribe_get_start_date( $post, false, $format = "g:i a" ) !!} @ {!! tribe_get_venue ( $post->ID ) !!}</time>
          </div>
        </div>
      </article>
    @endforeach
  @else
    <p>No hay eventos que mostrar</p>
  @endif
</div>