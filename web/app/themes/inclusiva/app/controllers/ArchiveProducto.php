<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Product extends Controller
{
  public static function info()
  {
    $min = (get_field('prod__vol_min')) ? get_field('prod__vol_min') : 'Sin especificar';
    $max = (get_field('prod__vol_max')) ? get_field('prod__vol_max') : 'Sin especificar';
    
    return (object) array(
      'price' => get_field('prod__precio'),
      'pres' => get_field('prod__pres'),
      'env' => get_field('prod__envase'),
      'reg' => get_field('prod__reg_sanit'),
      'ben' => get_field('prod__ben'),
      'min' => $min,
      'max' => $max,
    );
  }

  public static function producer()
  {
    $terms = get_the_terms( get_post()->ID, 'productor');
    $name = get_the_term_list( get_post()->ID, 'productor', '', ',', '' );    
    $terms_string = ($terms) ? join(', ', wp_list_pluck($terms, 'name')) : '';

    if ($terms_string !== '') {
      $produ__term = array_pop($terms);
      $ruc = get_field('produ__ruc', $produ__term ) ? get_field('produ__ruc', $produ__term ) : 'Sin especificar';
      $email = (get_field('produ__correo', get_queried_object() )) ? get_field('produ__correo', get_queried_object() ) : 'Sin especificar';
      $phone = get_field('produ__telef', $produ__term ) ? get_field('produ__telef', $produ__term ) : 'Sin especificar';;
       
      return (object) array (
        'name' => $name,
        'ruc' => $ruc,
        'phone' => $phone,
        'email' => $email
      );
    }

    return (object) array (
      'name' => 'Sin especificar',
      'ruc' => 'Sin especificar',
      'phone' => 'Sin especificar',
      'email' => 'Sin especificar'
    );

    // return var_dump($terms_string);
  }

  public static function brand()
  {
    $marca = get_the_term_list( get_the_ID(), 'marca', '', ',', '' );
    
    return $marca;
  }
}
