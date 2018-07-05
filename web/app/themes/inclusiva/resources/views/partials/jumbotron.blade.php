<div class="jumbotron jumbotron-fluid">
  <div class="container">
    @include('partials.page-header')
    
    @if (is_page_template( 'views/template-directorios.blade.php' ))
      <hr class="my-4">
      
      @include('partials.form.dir-filter')
    @endif
  </div>
</div>