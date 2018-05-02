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
    $productores__terms = get_the_terms( get_the_ID(), 'productor');
    $produ__term = array_pop($productores__terms);
    $ruc = get_field('produ__ruc', $produ__term );
    $phone = get_field('produ__telef', $produ__term );
    
    return (object) array (
      'name' => $produ__term->name,
      'ruc' => $ruc,
      'phone' => $phone
    );
  }
}
