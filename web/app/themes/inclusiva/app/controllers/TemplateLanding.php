<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class Landing extends Controller
{
  public function getParent() {
    $post_id = get_post()->ID;
    $parents = array_reverse(get_post_ancestors( $post_id ));
    $id = ($parents) ? $parents[count($parents)-1]: $post_id;
    $count = count($parents);

    $post_pt = get_page_template_slug($post_id);
    $pt = get_page_template_slug($id);

    if ( $post_pt === $pt ) {
      return $id;
    } else {
      return null;
    }
  }

  public function isFront() {
    return get_field('isFront');
  }

  public function hasFeed() {
    return get_field('hasFeed');
  }

  public function feed() {
    $parent = $this->getParent();
    
    if ( $parent !== null ) {
      return get_field('feed', $parent);
    }else{
      return get_field('feed');
    }
  }

  public function hasVideos() {
    return get_field('hasVideos');
  }

  public function hasPhotos() {
    return get_field('hasPhotos');
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
    $parent = $this->getParent();
    $feedTag = $this->feed()->slug;
      
    return (object) array(
      'is' => get_field('hasMenu', $parent),
      'menu' => $feedTag
    );
  }

  public function logo() {
    $parent = $this->getParent();
    
    if ( $parent !== null ) {
      return get_field('logo', $parent);
    }else{
      return get_field('logo');
    }
  }

  public function headerType() {
    $parent = $this->getParent();

    if ( $parent !== null ) {
      $type = get_field('headerType', $parent);
      $realID = $parent;
    }else {
      $type = get_field('headerType');
      $realID = get_post()->ID;
    }
    
    if( $type ) {
      if( $type === "slider" ) {
        return (object) array(
          'is' => 'slider',
          'items' => get_attached_media( 'image/jpeg', $realID ),
        );
      }

      if( $type === 'thumbnail') {
        return (object) array(
          'is' => 'thumbnail',
          'item' => get_the_post_thumbnail_url( $realID, 'full' ),
        );
      }

    } 
    
    return (object) array(
      'is' => 'default',
    );

  }

  public function color() {
    $parent = $this->getParent();
    
    if ( $parent !== null ) {
      return get_field('themeColor', $parent);
    }else{
      return get_field('themeColor');
    }
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