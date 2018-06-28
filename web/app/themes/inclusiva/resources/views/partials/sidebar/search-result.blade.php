<aside id="omnisearch">
    <div class="container">
      {{-- <h2 class="text-center mt-5">Busque en todo el sitio</h2> --}}
      <div class="search-result-container">
        <div class="wp-pagenavi-container pagination-container">
          <nav class="pagination wp-pagenavi"></nav>
        </div>
  
        @include('partials.content-placeholder')
  
         <div class="search-result content-container"></div>
          
        <div class="wp-pagenavi-container pagination-container">
          <nav class="pagination wp-pagenavi"></nav>
        </div>
      </div>
    </div>
  </aside>