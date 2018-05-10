<section id="footer" class="">
    <div class="container">
      <div class="row">
        <section class="widget widget_brand">
            <address>
              <strong>{{ get_bloginfo( 'description' ) }} - {{ get_bloginfo( 'name' ) }}</strong><br><br>
              Av. República de Chile 350<br>
              Jesús María, PE 15072<br>
              <abbr title="Teléfono">T:</abbr> <a href="tel:5112058030">+511 205-8030</a><br>
            </address>
            <address>
              <a href="mailto:{{ antispambot('webmaster@agrorural.gob.pe') }}">{{ antispambot('webmaster@agrorural.gob.pe') }}</a>
            </address>
        </section>

        <section class="widget widget_footer_menu">
            @if (has_nav_menu('footer_navigation'))
                {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'depth' => 1, 'container' => 'nav', 'container_id' => 'footer_navigation', 'menu_class' => 'nav flex-column', 'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback', 'walker' => new WP_Bootstrap_Navwalker()]) !!}
            @endif
        </section>

        <section class="widget widget_forms_menu widget_social_menu">
            @if (has_nav_menu('forms_navigation'))
                {!! wp_nav_menu(['theme_location' => 'forms_navigation', 'depth' => 1, 'container' => 'nav', 'container_id' => 'forms_navigation', 'menu_class' => 'nav flex-column', 'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback', 'walker' => new WP_Bootstrap_Navwalker()]) !!}
            @endif
            @if (has_nav_menu('social_navigation'))
                {!! wp_nav_menu(['theme_location' => 'social_navigation', 'depth' => 1, 'container' => 'nav', 'container_id' => 'social_navigation', 'menu_class' => 'nav', 'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback', 'walker' => new WP_Bootstrap_Navwalker()]) !!}
            @endif
        </section>
      </div>
    </div>
  </section>