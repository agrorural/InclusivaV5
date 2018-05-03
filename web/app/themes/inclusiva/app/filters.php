<?php

namespace App;

/**
 * Add <body> classes
 */
add_filter('body_class', function (array $classes) {
    /** Add page slug if it doesn't exist */
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    /** Add class if sidebar is active */
    if (display_sidebar()) {
        $classes[] = 'sidebar-primary';
    }

    /** Add class if is blog page */
    if (is_home()) {
      $classes[] = 'theme-green';
    }

    /** Add class if is directory page */
    if ( is_page_template( 'views/template-directorios.blade.php' ) ) {
      $classes[] = 'theme-green';
    }

    /** Add class if is documents page */
    if ( is_page_template( 'views/template-documentos.blade.php' ) ) {
      $classes[] = 'theme-gray';
    }

    /** Add class if is category */
    if (is_category()) {
      $classes[] = 'theme-blue';
    }

    /** Add class if is is producto post type archive */
    if (is_post_type_archive('producto') || is_singular('producto') || is_tax(array('marca', 'productor')) ) {
      $classes[] = 'theme-purple';
    }

    /** Clean up class names for custom templates */
    $classes = array_map(function ($class) {
        return preg_replace(['/-blade(-php)?$/', '/^page-template-views/'], '', $class);
    }, $classes);

    return array_filter($classes);
});

/**
 * Add custom excerpt length
 */
function inclusiva_custom_excerpt_length( $length ) {
  return 15;
}

add_filter( 'excerpt_length', __NAMESPACE__.'\\inclusiva_custom_excerpt_length', 999 );

/**
 * Add "… Continued" to the excerpt
 */
add_filter('excerpt_more', function () {
    return ' &hellip; ';
});

/**
 * Template Hierarchy should search for .blade.php files
 */
collect([
    'index', '404', 'archive', 'author', 'category', 'tag', 'taxonomy', 'date', 'home',
    'frontpage', 'page', 'paged', 'search', 'single', 'singular', 'attachment'
])->map(function ($type) {
    add_filter("{$type}_template_hierarchy", __NAMESPACE__.'\\filter_templates');
});

/**
 * Render page using Blade
 */
add_filter('template_include', function ($template) {
    $data = collect(get_body_class())->reduce(function ($data, $class) use ($template) {
        return apply_filters("sage/template/{$class}/data", $data, $template);
    }, []);
    if ($template) {
        echo template($template, $data);
        return get_stylesheet_directory().'/index.php';
    }
    return $template;
}, PHP_INT_MAX);

/**
 * Tell WordPress how to find the compiled path of comments.blade.php
 */
add_filter('comments_template', function ($comments_template) {
    $comments_template = str_replace(
        [get_stylesheet_directory(), get_template_directory()],
        '',
        $comments_template
    );
    return template_path(locate_template(["views/{$comments_template}", $comments_template]) ?: $comments_template);
});
