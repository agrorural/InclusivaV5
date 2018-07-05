<aside id="omnisearch">
  {{-- <h2 class="text-center mt-5">Busque en todo el sitio</h2> --}}
  <div class="search-result-container">
    <div class="wp-pagenavi-container pagination-container container pagination-fixed pagination-top">
      <nav class="pagination wp-pagenavi"></nav>
    </div>
    
    <div class="container result-container">
      <div id="simpleBarSearch">
        @include('partials.content-placeholder')
        <div class="search-result content-container"></div>
      </div>
    </div>
  </div>
</aside>