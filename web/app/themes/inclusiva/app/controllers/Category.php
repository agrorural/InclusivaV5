<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Category extends Controller
{

    // Pass on all fields from Advanced Custom Fields to the view
    // protected $acf = true;
  
    public function flag()
    {
        return (get_field('dz_flag', get_queried_object())) ? get_field('dz_flag', get_queried_object()) : array('url' => \App\asset_path('images/card__flag--default.jpg'), 'title' => 'AGRO RURAL');
    }

    public function bg()
    {
        return (get_field('dz_bg', get_queried_object())) ? get_field('dz_bg', get_queried_object()) : \App\asset_path('images/card__bg--vertical--default.jpg');
    }

    public function address()
    {
        return get_field('dz_address', get_queried_object());
    }

    public function phoneExt()
    {
      //$the_phone = ( get_field('dz_phone', get_queried_object()) ) ? get_field('dz_phone', get_queried_object()) : '';
      
      $the_slug = get_queried_object()->slug;

      $the_post = ($the_slug == 'agro-rural') ? get_page_by_path('direccion-ejecutiva' , OBJECT, 'directorios') : get_page_by_path($the_slug , OBJECT, 'directorios');

      $the_phone = (get_field('dir_phone_ext', $the_post->ID) ? get_field('dir_phone_ext', $the_post->ID) : '');

      if( $the_phone !== '' ){
        $pos1 = strpos($the_phone, "-");
        $pos2 = strpos($the_phone, "-", $pos1 + strlen("-"));
  
        if ( $pos1 === 7 ) {
  
          if( $pos1 !== false && $pos2 !== false ) {
            $localNumber = substr($the_phone, 0, $pos1);
            $ext = substr($the_phone, ($pos1 + 1), (($pos2 - 1 ) - $pos1 ));
            $ext2 = substr($the_phone, ($pos2 + 1));
  
            return (object) array(
              'number' => $localNumber,
              'ext' => $ext,
              'ext2' => $ext2
            );
          }
  
          if( $pos1 !== false && $pos2 === false ) {
            $localNumber = substr($the_phone, 0, $pos1); 
            $ext = substr($the_phone, ($pos1 + 1));
  
            return (object) array(
              'number' => $localNumber,
              'ext' => $ext,
              'ext2' => ''
            );
          }
  
          $localNumber = substr($the_phone, $pos1); 
  
          return (object) array(
            'number' => $localNumber,
            'ext' => '',
            'ext2' => ''
          );
        }

        if ( $pos1 !== false && $pos1 !== 7 ) {
          return (object) array(
            'number' => '',
            'ext' => '',
            'ext2' => '',
            'message' => 'Solo números fijos de Lima sin codigo de ciudad y con anexo(s)'
          );
        }
      }
    
      return (object) array(
        'number' => '',
        'ext' => '',
        'ext2' => '',
        'message' => 'No tiene formato correcto'
      );

      //return $the_phone;
    }

    public function phoneLocal()
    {
      $the_slug = get_queried_object()->slug;

      $the_post = ($the_slug == 'agro-rural') ? get_page_by_path('direccion-ejecutiva' , OBJECT, 'directorios') : get_page_by_path($the_slug , OBJECT, 'directorios');

      $the_phone = (get_field('dir_phone_local', $the_post->ID) ? get_field('dir_phone_local', $the_post->ID) : '');

      //$the_phone = ( get_field('dz_phone_local', get_queried_object()) ) ? get_field('dz_phone_local', get_queried_object()) : '';

      if( $the_phone !== '' ){
        $pos1 = strpos($the_phone, "-");
  
        if ( $pos1 !== 1 && $pos1 !== false ) {
          $cityCode = substr($the_phone, 0, $pos1);
          $localNumber = substr($the_phone, ($pos1 + 1)); 
  
          return (object) array(
            'code' => $cityCode,
            'number' => $localNumber
          );
        }

        if ( $pos1 === false ) {
          return (object) array(
            'city_code' => '',
            'number' => '',
            'message' => 'Ingrese codigo de ciudad'
          );
        }

        if ( $pos1 === 1 ) {
          return (object) array(
            'city_code' => '',
            'number' => '',
            'message' => 'Ingrese código de ciudad correcto'
          );
        }
      }
    
      return (object) array(
        'city_code' => '',
        'number' => ''
      );

      //return $the_phone;
    }

    public function phoneLocalTwo()
    {
      //$the_phone = ( get_field('dz_phone_local_two', get_queried_object()) ) ? get_field('dz_phone_local_two', get_queried_object()) : '';

      $the_slug = get_queried_object()->slug;

      $the_post = ($the_slug == 'agro-rural') ? get_page_by_path('direccion-ejecutiva' , OBJECT, 'directorios') : get_page_by_path($the_slug , OBJECT, 'directorios');

      $the_phone = (get_field('dir_phone_local_2', $the_post->ID) ? get_field('dir_phone_local_2', $the_post->ID) : '');

      if( $the_phone !== '' ){
        $pos1 = strpos($the_phone, "-");
  
        if ( $pos1 !== 1 && $pos1 !== false ) {
          $cityCode = substr($the_phone, 0, $pos1);
          $localNumber = substr($the_phone, ($pos1 + 1)); 
  
          return (object) array(
            'code' => $cityCode,
            'number' => $localNumber
          );
        }

        if ( $pos1 === false ) {
          return (object) array(
            'city_code' => '',
            'number' => '',
            'message' => 'Ingrese codigo de ciudad'
          );
        }

        if ( $pos1 === 1 ) {
          return (object) array(
            'city_code' => '',
            'number' => '',
            'message' => 'Ingrese código de ciudad correcto'
          );
        }
      }
    
      return (object) array(
        'city_code' => '',
        'number' => ''
      );

      //return $the_phone;
    }

    public function phoneDirect()
    {

      $the_slug = get_queried_object()->slug;

      $the_post = ($the_slug == 'agro-rural') ? get_page_by_path('direccion-ejecutiva' , OBJECT, 'directorios') : get_page_by_path($the_slug , OBJECT, 'directorios');

      //$the_phone = ( get_field('dz_phone_direct', get_queried_object()) ) ? get_field('dz_phone_direct', get_queried_object()) : '';

      $the_phone = (get_field('dir_phone_direct', $the_post->ID) ? get_field('dir_phone_direct', $the_post->ID) : '');

      if( $the_phone !== '' ){
        $pos1 = strpos($the_phone, "-");
  
        if ( $pos1 === false ) {
          return (object) array(
            'number' => $the_phone
          );
        }

        if ( $pos1 !== false ) {
          return (object) array(
            'number' => '',
            'message' => 'No debe ingresar código de ciudad ni anexos'
          );
        }
      }
    
      return (object) array(
        'code' => '',
        'number' => ''
      );

      //return $the_phone;
    }

    public function agency()
    {
        $the_slug = get_queried_object()->slug;
        
        $the_agencies = ($the_slug == 'agro-rural') ? ' <small>direcciones zonales</small>' : ' <small>agencias zonales</small>';
        
        return get_field('dz_agency', get_queried_object()) . $the_agencies;
    }

    public function directory()
    {
      $the_slug = get_queried_object()->slug;

      $the_post = ($the_slug == 'agro-rural') ? get_page_by_path('direccion-ejecutiva' , OBJECT, 'directorios') : get_page_by_path($the_slug , OBJECT, 'directorios');

      return (object) array(
        'director' => get_field('dir_responsable', $the_post->ID),
        'resolucion' => get_field('dir_resolucion', $the_post->ID),
        'status' => get_field('dir_situacion', $the_post->ID),
        'position' => get_field('dir_cargo', $the_post->ID),
        'email' => get_field('dir_correo', $the_post->ID),
        'cv' => get_field('dir_cv', $the_post->ID),
        'dji' => get_field('dir_dji', $the_post->ID),
        'photo' => ( get_field('dir_imagen', $the_post->ID) ) ? get_field('dir_imagen', $the_post->ID)['url'] : \App\asset_path('images/avatar--default.jpg')
      );
    }
}