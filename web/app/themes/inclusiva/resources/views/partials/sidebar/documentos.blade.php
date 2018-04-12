<section class="widget widget_docs_menu">
  <h3>Documentos</h3>
  <nav class="">
      @if (has_nav_menu('docs_navigation'))
        {!! wp_nav_menu(['theme_location' => 'docs_navigation', 'menu_class' => 'left-links', 'container' => '']) !!}
      @endif
    </nav>
</section>