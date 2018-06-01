<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Service extends Controller
{
  public static function info()
  {
    $url = (get_field('servicio__url')) ? get_field('servicio__url') : get_the_permalink();
    $text = (get_field('servicio__url__txt')) ? get_field('servicio__url__txt') : 'Ver servicio';
    
    return (object) array(
      'url' => $url,
      'text' => $text,
    );
  }
}