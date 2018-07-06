<?php

namespace App;

use Sober\Controller\Controller;

class Single extends Controller
{
  public function type()
  {
    return (get_post_type() !== 'post') ? $typeOrFormat = get_post_type() : $typeOrFormat = get_post_format();
  }

  public function video()
  {
    return get_field('video__id');
  }

  public function rdeLink()
  {
    return get_field('rde_link');
  }

  public function category()
  {

    ( ! empty(get_the_category()) ) ? $cat = get_the_category()[0] : $cat = 'AGRO RURAL';

    // return var_dump($cat);
    if ( $cat === 'AGRO RURAL' ) {
      $catID = get_cat_ID( $cat );
      
      return (object) array(
        'id'    =>  $catID,
        'name'  => $cat,
        'url'  => get_category_link( $catID )
      );
    }

    return (object) array(
      'id'    => $cat->term_id,
      'name'  => $cat->name,
      'url'  => get_category_link( $cat->term_id )
    );
  }
}
