@php
  $page_1 = get_page_by_path('la-institucion');
  $page_2 = get_page_by_path('la-institucion/directorio');
  $page_3 = get_page_by_path('la-institucion/organigrama');

  $page_1_ID = $page_1->ID;
  $page_2_ID = $page_2->ID;
  $page_3_ID = $page_3->ID;

  $the_post = get_post($page_1_ID);

  $content = get_post_field( 'post_content', $page_1_ID );
  $content_parts = get_extended( $content );
{{--
  echo '<pre>';
    var_dump(get_permalink($page_1_ID));
  echo '</pre>';
  --}}
@endphp
<section id="who-we-are" class="section">
  <div class="container">
    <article>
      <aside>
        @php
          if (has_post_thumbnail( $page_1_ID ) ){
            $image = get_the_post_thumbnail($page_1_ID);
            echo  $image;
          }
        @endphp
      </aside>
      <div class="section-content">
        <h2 class="section-title who-we-are">{!! $the_post->post_title !!}</h2>
        <p>{!! $content_parts['main'] !!}</p>
        <p><a href="{{get_permalink($page_1_ID)}}" class="btn btn-outline-primary">Más info</a></p>

        <nav class="nav">
          <a class="nav-link active" href="{{get_permalink($page_1_ID)}}">Quiénes somos</a>
          <a class="nav-link" href="{{get_permalink($page_2_ID)}}">Directorio</a>
          <a class="nav-link" href="{{get_permalink($page_3_ID)}}">Organigrama</a>
        </nav>
      </div>
    </article>
  </div>
</section>