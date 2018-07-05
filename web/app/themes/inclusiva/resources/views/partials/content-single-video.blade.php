{{-- @debug --}}
<article @php(post_class())>
  <iframe width="100%" height="415" src="https://www.youtube.com/embed/{{ $video }}" frameborder="0" allowfullscreen></iframe>
  {{-- <header>
    <h1 class="entry-title">{{ get_the_title() }}</h1>
    @include('partials/entry-meta')
  </header> --}}
  <div class="entry-content">
    @php(the_content())
  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  @php(comments_template('/partials/comments.blade.php'))
</article>
