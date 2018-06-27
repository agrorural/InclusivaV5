<?php

namespace App;

use Sober\Controller\Controller;

class Single extends Controller
{
  public function type(){
    return (get_post_type() !== 'post') ? $typeOrFormat = get_post_type() : $typeOrFormat = get_post_format();
  }

  public function video()
    {
      return get_field('video__id');
    }
}
