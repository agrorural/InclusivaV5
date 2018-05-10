<section id="footer__post" class="">
  <div class="container">
      <nav class="nav footer__post__navs">
        <a class="nav-link" href="http://www.minagri.gob.pe" target="blank"><img src="@asset('images/minagri__logo.svg')" height="40px" alt="Minagri"></a>
        <a class="nav-link" href="{{ home_url('/') }}"><img src="@asset('images/agro_rural__logo.svg')" height="50px" alt="Programa de Desarrollo Productivo Agrario Rural - AGRO RURAL"></a>
        <a class="nav-link" href="http://www.gob.pe" target="blank"><img src="@asset('images/el_peru_primero__logo.svg')" height="40px" alt="El Perú Primero"></a>
      </nav>
      @if (has_nav_menu('footer_navigation'))
          {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'depth' => 0, 'container' => 'nav', 'container_class' => 'nav', 'container_id' => 'footer_navigation', 'menu_class' => 'navbar-nav mr-auto', 'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback', 'walker' => new WP_Bootstrap_Navwalker()]) !!}
      @endif
  </div>
</section>