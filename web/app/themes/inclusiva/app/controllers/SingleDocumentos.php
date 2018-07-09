<?php

namespace App;

use Sober\Controller\Controller;

class SingleDocumentos extends Controller
{
  public function type()
  {
    return (get_post_type() !== 'post') ? $typeOrFormat = get_post_type() : $typeOrFormat = get_post_format();
  }

  public function rdeLink()
  {
    return get_field('rde_link');
  }

  public function terms()
  {
    $post = get_post(get_post()->ID); 
    $post_slug = strtoupper($post->post_name);
    $term_list = wp_get_post_terms(get_post()->ID, 'tipos', array("fields" => "all"));

    $count = count($term_list);

    if($term_list && $count > 1 && $term_list[0]->slug == 'pac' || $term_list[0]->slug == 'cds'){
      return (object) array (
        'url' => wp_upload_dir()['baseurl'] . '/transparencia/documentos/rda/' . $post_slug . '.PDF'
      );
    }

    return (object) array (
      'url' => wp_upload_dir()['baseurl'] . '/transparencia/documentos/rde/' . $post_slug . '.PDF'
    );
  }
}
