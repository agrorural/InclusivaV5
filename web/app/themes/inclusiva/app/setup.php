<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);

    $ajax_params = array(
      'ajax_url' => admin_url('admin-ajax.php'),
      'ajax_nonce' => wp_create_nonce('my_nonce'),
      'upload_dir' => wp_upload_dir(),
      'is_pt'  => is_page_template(),
    );

    if( is_page_template( 'views/template-directorios.blade.php' ) ) {
      $dir_grupos = get_terms( array(
        'taxonomy' => 'grupos',
        'hide_empty' => true,
      ) );
  
      $dir_grupos_ids = wp_list_pluck( $dir_grupos, 'term_id' );
  
      $postTypeArr = array_values(App::postTypeArr());

      $ajax_params['dir_grupos_id'] = $dir_grupos_ids;
      $ajax_params['post_types'] = $postTypeArr;
    }

    if( is_page_template( 'views/template-documentos.blade.php' ) ) {
      $ajax_params['term'] = get_term( get_field('doc__tipo'), '', ARRAY_A);
    }

    if( is_page_template( 'views/template-landing.blade.php' ) ) {
      $ajax_params['has_slider'] = get_field('hasSlider');
      $ajax_params['has_banners'] = get_field('hasBanners');
      $ajax_params['has_videos'] = get_field('hasVideos');
    }

    wp_localize_script('sage/main.js', 'wp', $ajax_params);
}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
        'super_navigation_left' => __('Super Navigation Left', 'sage'),
        'super_navigation_right' => __('Super Navigation Right', 'sage'),
        'social_navigation' => __('Social Navigation', 'sage'),
        'forms_navigation' => __('Forms Navigation', 'sage'),
        'footer_navigation' => __('Footer Navigation', 'sage'),
        'docs_navigation' => __('Docs Navigation', 'sage'),
        'categories_navigation' => __('Categories Navigation', 'sage'),
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    add_image_size( 'feed-thumb', 190, 120, array( 'left', 'top' ) ); // (cropped)
    add_image_size( 'featured-thumb', 1270, 530, array( 'left', 'top' ) ); // (cropped)
    add_image_size( 'content-thumb', 720, 420, array( 'left', 'top' ) ); // (cropped)
    add_image_size( 'card-vertical-thumb', 560, 685, array( 'left', 'top' ) ); // (cropped)

    add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
      'name'          => __('Events', 'sage'),
      'id'            => 'sidebar-events'
  ] + $config);
    register_sidebar([
        'name'          => __('Footer', 'sage'),
        'id'            => 'sidebar-footer'
    ] + $config);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Make theme available for translation
     */
    load_theme_textdomain('sage', get_stylesheet_directory() . '/lang');

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});
