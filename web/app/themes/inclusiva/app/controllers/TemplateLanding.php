<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class Landing extends Controller
{
  public function hasFeed() {
    return get_field('hasFeed');
  }

  public function feed() {
    return get_field('feed');
  }

  public function hasVideos() {
    return get_field('hasVideos');
  }

  public function hasBanners() {
    return get_field('hasBanners');
  }

  public function banners() {
    return get_field('banners');
  }

  public function hasDocs() {
    return get_field('hasDocs');
  }

  public function docs() {
    return get_field('docs');
  }

  public function hasMenu() {
    return get_field('hasMenu');
  }

  public function logo() {
    return get_field('brandLogo');
  }

  public function slider() {
    if( get_field('hasSlider') ) {
      return get_attached_media( 'image/jpeg', get_post()->ID );
    }
  }

  public function color() {
    return get_field('themeColor');
  }

  public function view() {
    return get_field('themeView');
  }

  public static function query( $post_type = 'post', $tax = 'post_tag', $term = '', $ppp = 4 )
  {
    $args  = array(
      'post_type' => $post_type,
      'posts_per_page' => $ppp,
    );

    if( $post_type === 'post' && $tax ==='post_tag' ) {
      $args['tag'] = $term;

      return new WP_Query( $args );
    } elseif( $post_type === 'post' && $tax ==='post_format' ) {
      $args['tag'] = $term;
      $args[$tax] = 'post-format-video';

      return new WP_Query( $args );
      
    } else {
      $args[$tax] = $term;

      return new WP_Query( $args );
    }
    
    return new WP_Query( $args );

  }
}