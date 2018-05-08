<div class="jumbotron jumbotron-fluid container-boxed">
  <div class="container">
    @include('partials.page-header')

    @if (is_page_template( 'views/template-documentos.blade.php' ))
      <hr class="my-4">
      
      @include('partials.form.docs-filter')
    
    @elseif ( ( !is_front_page() && is_home() ) || is_category() )

      @if (has_nav_menu('categories_navigation'))  
        @php
          $categories_navigation = array(
              'menu'            => 'navegacion-de-categorias',
              'container'       => 'nav',
              'container_class' => 'pagination',
              'container_id'    => '',
              'menu_class'      => 'nav menu',
              'menu_id'         => 'categories-menu'
          );
        @endphp
        
        <div id="simpleBarCategories" class="pagination-container">
          {!! wp_nav_menu( $categories_navigation ) !!}
        </div>
      @endif
    
    @elseif (is_page_template( 'views/template-directorios.blade.php' ))
      <hr class="my-4">
      
      @include('partials.form.dir-filter')
    @elseif (is_page_template( 'views/template-landing.blade.php' ))
      Hola mundo
    @endif
  </div>
</div>