<div class="jumbotron jumbotron-fluid container-boxed">
  <div class="container">
    <div class="page-header">
      <h1>{!! App::title() !!}</h1>
      @if ( is_page_template() || is_page( 'direcciones-zonales' ) )
        {!! App::page_template_desc() !!}
      @endif
    </div>
    @if (is_page_template( 'views/template-documentos.blade.php' ))
      <hr class="my-4">
      
      @include('partials.form.docs-filter')
    @endif
  </div>
    
</div>