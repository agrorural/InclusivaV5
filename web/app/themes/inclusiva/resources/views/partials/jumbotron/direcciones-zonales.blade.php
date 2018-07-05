<div class="jumbotron jumbotron-fluid">
  <div class="container">
    @include('partials.page-header.direcciones-zonales')
    
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
  </div>
</div>