<?php
/**
 * Quita el menu de comentarios al rol Contributor
 */
add_action( 'admin_menu', __NAMESPACE__ . '\\comments_menu_removing' );
function comments_menu_removing() {
  if( !current_user_can( 'edit_others_pages' ) ){
      remove_menu_page( 'edit-comments.php' );          //Comments
  }
}
/**
 * Crea shortcode [image]
 */
function agro_image_shortcode($atts) {
  $fileName = \App\asset_path('images/' .  $atts['src']);
  
  return '<img src="' . $fileName . '" />';
}
  
  add_shortcode('image', __NAMESPACE__ . '\\agro_image_shortcode');
  
  add_filter('widget_text', 'do_shortcode');
/**
 * Imposibilita la lectura de posts que no son suyos al rol Contributor
 */
add_action( 'load-edit.php', __NAMESPACE__ . '\\posts_for_current_contributor' );
function posts_for_current_contributor() {
  global $user_ID;
  if ( current_user_can( 'contributor' ) ) {
      if ( ! isset( $_GET['author'] ) ) {
        wp_redirect( add_query_arg( 'author', $user_ID ) );
        exit;
      }
  }
}

/**
 * Agrega API de Google Maps en ACF
 */

function my_acf_google_map_api( $api ){
	
	$api['key'] = 'AIzaSyDzKaN5RTFgX1jSy-dpVgIdGnwDdpHFpws';
	
	return $api;
	
}

add_filter('acf/fields/google_map/api', __NAMESPACE__ . '\\my_acf_google_map_api');

/**
 * Cambia el output de WP-Pagenavi
 */ 
function wppn_custom_output($html) {
	$out = '';
 
	$out = str_replace("<div class='wp-pagenavi'>","<nav class='pagination wp-pagenavi'>", $html);
	$out = str_replace("</div>","</nav>", $out);
 
	return '<div class="wp-pagenavi-container pagination-container">'.$out.'</div>';
}

add_filter( 'wp_pagenavi', __NAMESPACE__ . '\\wppn_custom_output', 10, 2 );

/**
 * Mostrar sidebar
 */
add_filter('sage/display_sidebar', function ($display) {
  static $display;

  isset($display) || $display = in_array(true, [
    // The sidebar will be displayed if any of the following return true
    is_singular('post'),
    is_404(),
    is_page_template( 'views/template-documentos.blade.php' ),
  ]);

  return $display;
});

/**
 * Ajax para Docssearch
 */
add_action('wp_ajax_ajax_docs_search', __NAMESPACE__ . '\\ajax_docs_search_callback');
add_action('wp_ajax_nopriv_ajax_docs_search', __NAMESPACE__ . '\\ajax_docs_search_callback');

function ajax_docs_search_callback(){
    header('Content-Type:application/json');
    
    class objectToSend
    {
        var $action;
        var $postType;
        var $postTax;
        var $postTerm;
        var $txtKeyword;
        var $optMonth;
        var $optYear;
        var $optPerPage;
        var $max_num_pages; 
        var $response;
        var $bError;
        var $vMensaje;
        var $paged;

        function __construct($action, $postType, $postTax, $postTerm, $txtKeyword, $optMonth, $optYear, $optPerPage, $max_num_pages, $response, $bError, $vMensaje, $paged) {
           $this->action = $action; 
           $this->postType = $postType; 
           $this->postTax = $postTax; 
           $this->postTerm = $postTerm; 
           $this->txtKeyword = $txtKeyword; 
           $this->optMonth = $optMonth; 
           $this->optYear = $optYear; 
           $this->optPerPage = $optPerPage; 
           $this->max_num_pages = $max_num_pages; 
           $this->response = $response; 
           $this->bError = $bError; 
           $this->vMensaje = $vMensaje; 
           $this->paged = $paged; 
          }
    }

    $objectToSend = new objectToSend(
      'ajax_docs_search',
      isset($_GET['postType'])?sanitize_text_field( $_GET['postType'] ) :'',
      isset($_GET['postTax'])?sanitize_text_field( $_GET['postTax'] ) :'',
      isset($_GET['postTerm'])?sanitize_text_field( $_GET['postTerm'] ) :'', 
      isset($_GET['txtKeyword'])?sanitize_text_field( $_GET['txtKeyword'] ):'', 
      isset($_GET['optMonth'])?intval( sanitize_text_field( $_GET['optMonth'] ) ):0, 
      isset($_GET['optYear'])?intval( sanitize_text_field( $_GET['optYear'] ) ):0, 
      isset($_GET['optPerPage'])?intval( sanitize_text_field( $_GET['optPerPage'] ) ):10, 
      isset($_GET['max_num_pages'])?intval( sanitize_text_field( $_GET['max_num_pages'] ) ):0, 
      array(),
      false,
      '',
      isset($_GET['paged'])?intval( sanitize_text_field( $_GET['paged'] ) ):1
    );

    $args = array(
        "post_type" => $objectToSend->postType,
        'tax_query' => array(
          array(
            'taxonomy' => $objectToSend->postTax,
            'field'    => 'slug',
            'terms'    => $objectToSend->postTerm,
          ),
        ),
        "posts_per_page" => $objectToSend->optPerPage,
        "s" => $objectToSend->txtKeyword,
        'paged' => $objectToSend->paged,
        'post_status'=> 'publish',
        'date_query' => array(
            array(
                'year'  => $objectToSend->optYear,
                'month' => $objectToSend->optMonth
            ),
        ),
    );

    $the_docs_query = new WP_Query( $args );
    // The Loop
    if ( $the_docs_query->have_posts() ) {
        while ( $the_docs_query->have_posts() ) {
            $the_docs_query->the_post();

            $postClass = get_post_class( get_the_ID() );
            
            $objectToSend->response[] = array(
                "id"              =>  get_the_ID(),
                "title"           => get_the_title(),
                "slug"            =>  get_post_field( 'post_name', get_post() ),
                "permalink"       => get_permalink(),
                "content"         => get_the_content(),
                "date"            => get_the_date(),
                "doc_link"        => get_field('rde_link'),
                "doc_ane__nom"    => get_field('doc_ane__nom'),
                "doc_ane__desc"   => get_field('doc_ane__desc'),
                "post_class" =>  join( ' ', $postClass ),
                "html"            => ''
            );
        }
        $objectToSend->bError = false;
        $objectToSend->vMensaje = $the_docs_query;
        $objectToSend->max_num_pages = $the_docs_query->max_num_pages;
        echo json_encode($objectToSend);
        /* Restore original Post Data */
        wp_reset_postdata();
    } else {
        $objectToSend->bError = true;
        $objectToSend->vMensaje = 'No se encontraron resultados';
        //$objectToSend->vMensaje = $the_docs_query;
        echo json_encode($objectToSend);
        wp_reset_postdata();
    }
    //var_dump($the_docs_query);
    wp_die();
}

/**
 * Ajax para busqueda de documentos
 */
add_action('wp_ajax_ajax_omni_search', __NAMESPACE__ . '\\ajax_omni_search_callback');
add_action('wp_ajax_nopriv_ajax_omni_search', __NAMESPACE__ . '\\ajax_omni_search_callback');

function ajax_omni_search_callback(){
    header('Content-Type:application/json');
    
    class objectToSend
    {
        var $action;
        var $postType;
        var $txtKeyword;
        var $optPerPage;
        var $max_num_pages; 
        var $response;
        var $bError;
        var $vMensaje;
        var $paged;

        function __construct($action, $postType, $txtKeyword, $optPerPage, $max_num_pages, $response, $bError, $vMensaje, $paged) {
           $this->action = $action; 
           $this->postType = $postType; 
           $this->txtKeyword = $txtKeyword;
           $this->optPerPage = $optPerPage;
           $this->max_num_pages = $max_num_pages;
           $this->response = $response;
           $this->bError = $bError;
           $this->vMensaje = $vMensaje;
           $this->paged = $paged;
          }
    }

    $objectToSend = new objectToSend(
      'ajax_omni_search',
      explode(',', (isset($_GET['postType'])?sanitize_text_field( $_GET['postType'] ) : '')),
      isset($_GET['txtKeyword'])?sanitize_text_field( $_GET['txtKeyword'] ):'', 
      isset($_GET['optPerPage'])?intval( sanitize_text_field( $_GET['optPerPage'] ) ):20, 
      isset($_GET['max_num_pages'])?intval( sanitize_text_field( $_GET['max_num_pages'] ) ):0, 
      array(),
      false,
      '',
      isset($_GET['paged'])?intval( sanitize_text_field( $_GET['paged'] ) ):1
    );

    $args = array(
        "post_type" => $objectToSend->postType,
        "posts_per_page" => $objectToSend->optPerPage,
        "s" => $objectToSend->txtKeyword,
        'paged' => $objectToSend->paged,
        'post_status'=> 'publish',
    );

    $the_omni_search_query = new WP_Query( $args );
    // The Loop
    if ( $the_omni_search_query->have_posts() ) {
        while ( $the_omni_search_query->have_posts() ) {
            $the_omni_search_query->the_post();
            $postClass = get_post_class( get_the_ID() );
            
            $objectToSend->response[] = array(
                "id"              =>  get_the_ID(),
                "title"           => get_the_title(),
                "slug"            =>  get_post_field( 'post_name', get_post() ),
                "permalink"       => get_permalink(),
                "excerpt"         => get_the_excerpt(),
                "date"            => get_the_date(),
                "post_class" =>  join( ' ', $postClass ),
                "post_type" => get_post_type(),
                "html"            => ''
            );
        }
        $objectToSend->bError = false;
        $objectToSend->vMensaje = $the_omni_search_query;
        $objectToSend->max_num_pages = $the_omni_search_query->max_num_pages;
        echo json_encode($objectToSend);
        /* Restore original Post Data */
        wp_reset_postdata();
    } else {
        $objectToSend->bError = true;
        $objectToSend->vMensaje = 'No se encontraron resultados';
        //$objectToSend->vMensaje = $the_omni_search_query;
        echo json_encode($objectToSend);
        wp_reset_postdata();
    }
    //var_dump($the_omni_search_query);
    wp_die();
}

/**
 * Ajax para busqueda de directorios
 */
add_action('wp_ajax_ajax_dir_search', __NAMESPACE__ . '\\ajax_dir_search_callback');
add_action('wp_ajax_nopriv_ajax_dir_search', __NAMESPACE__ . '\\ajax_dir_search_callback');

function ajax_dir_search_callback(){
    header('Content-Type:application/json');
    
    class objectToSend
    {
        var $action;
        var $postTerm;
        var $txtKeyword;
        var $response;
        var $bError;
        var $vMensaje;

        function __construct($action, $postTerm, $txtKeyword, $response, $bError, $vMensaje) {
           $this->action = $action; 
           $this->postTerm = $postTerm; 
           $this->txtKeyword = $txtKeyword; 
           $this->response = $response; 
           $this->bError = $bError; 
           $this->vMensaje = $vMensaje; 
          }
    }

    $objectToSend = new objectToSend(
      'ajax_dir_search',
      isset($_GET['postTerm'])?sanitize_text_field( $_GET['postTerm'] ) :'', 
      isset($_GET['txtKeyword'])?sanitize_text_field( $_GET['txtKeyword'] ):'', 
      array(),
      false,
      ''
    );

    $args = array(
        "post_type" => 'directorios',
        'tax_query' => array(
          array(
            'taxonomy' => 'grupos',
            'field'    => 'term_id',
            'terms'    => array($objectToSend->postTerm),
          ),
        ),
        "posts_per_page" => -1,
        "s" => $objectToSend->txtKeyword,
        'post_status'=> 'publish',
        'orderby' => 'menu_order title',
		    'order' => 'ASC',
    );

    
    $the_dir_query = new WP_Query( $args );
    
    $group = "";
    
    // The Loop
    if ( $the_dir_query->have_posts() ) {
        while ( $the_dir_query->have_posts() ) {
            $the_dir_query->the_post();

            $isOpen = false;
            $isClose = false;
            
            $sede = get_field('dir_sede');
            $address = get_field('dz_address', $sede->taxonomy  . '_' . $sede->term_id );
            
            $dir_phone_ext = get_field('dir_phone_ext');
            $dir_phone_local = get_field('dir_phone_local');
            $dir_phone_local_2 = get_field('dir_phone_local_2');
            $dir_phone_direct = get_field('dir_phone_direct');

            if( $dir_phone_ext !== '' ){
              $pos1 = strpos($dir_phone_ext, "-");
              $pos2 = strpos($dir_phone_ext, "-", $pos1 + strlen("-"));
        
              if ( $pos1 === 7 ) {
        
                if( $pos1 !== false && $pos2 !== false ) {
                  $localNumber = substr($dir_phone_ext, 0, $pos1);
                  $ext = substr($dir_phone_ext, ($pos1 + 1), (($pos2 - 1 ) - $pos1 ));
                  $ext2 = substr($dir_phone_ext, ($pos2 + 1));
        
                  $phoneExt = array(
                    'number' => $localNumber,
                    'ext' => $ext,
                    'ext2' => $ext2,
                    'html' => '<a href="tel:+511 ' . $localNumber . ';' . $ext . '">(01) ' . $localNumber . ' axo. ' . $ext . '</a><a href="tel:' . $localNumber . ';' . $ext2 . '">(01) ' . $localNumber . ' axo. ' . $ext2 . '</a>'
                  );
                }
        
                if( $pos1 !== false && $pos2 === false ) {
                  $localNumber = substr($dir_phone_ext, 0, $pos1); 
                  $ext = substr($dir_phone_ext, ($pos1 + 1));
        
                  $phoneExt = array(
                    'number' => $localNumber,
                    'ext' => $ext,
                    'ext2' => '',
                    'html' => '<a href="tel:+511' . $localNumber . ';' . $ext . '">(01) ' . $localNumber . ' axo. ' . $ext . '</a>'
                  );
                }
              }
      
              if ( $pos1 !== false && $pos1 !== 7 ) {
                $phoneExt = array(
                  'number' => '',
                  'ext' => '',
                  'ext2' => '',
                  'message' => 'Solo números fijos de Lima sin codigo de ciudad y con anexo(s)'
                );
              }
            }else {
              $phoneExt = null;
            }

            if( $dir_phone_local !== '' ){
              $pos1 = strpos($dir_phone_local, "-");
        
              if ( $pos1 !== 1 && $pos1 !== false ) {
                $cityCode = substr($dir_phone_local, 0, $pos1);
                $localNumber = substr($dir_phone_local, ($pos1 + 1)); 
        
                $phoneLocal = array(
                  'code' => $cityCode,
                  'number' => $localNumber,
                  'html' => '<a href="tel:+51' . $cityCode . $localNumber . '">('. $cityCode . ') ' .  $localNumber . '</a>'
                );
              }
      
              if ( $pos1 === false ) {
                $phoneLocal = null;
              }
      
              if ( $pos1 === 1 ) {
                $cityCode = substr($dir_phone_local, 0, $pos1);
                $localNumber = substr($dir_phone_local, ($pos1 + 1)); 
                $phoneLocal = array(
                  'code' => $cityCode,
                  'number' => $localNumber,
                  'message' => 'Número de Lima',
                  'html' => '<a href="tel:+51' . $cityCode . $localNumber . '">(01) ' . $localNumber . '</a>'                  
                );
              }
            }else{
              $phoneLocal = null;
            }

            if( $dir_phone_local_2 !== '' ){
              $pos1 = strpos($dir_phone_local_2, "-");
        
              if ( $pos1 !== 1 && $pos1 !== false ) {
                $cityCode = substr($dir_phone_local_2, 0, $pos1);
                $localNumber = substr($dir_phone_local_2, ($pos1 + 1)); 
        
                $phoneLocal2 = array(
                  'code' => $cityCode,
                  'number' => $localNumber,
                  'html' => '<a href="tel:+51' . $cityCode . $localNumber . '">('. $cityCode . ') ' .  $localNumber . '</a>'                  
                );
              }
      
              if ( $pos1 === false ) {
                $phoneLocal2 = array(
                  'city_code' => '',
                  'number' => '',
                  'message' => 'Ingrese codigo de ciudad'
                );
              }
      
              if ( $pos1 === 1 ) {
                $cityCode = substr($dir_phone_local_2, 0, $pos1);
                $localNumber = substr($dir_phone_local_2, ($pos1 + 1)); 
                $phoneLocal2 = array(
                  'code' => $cityCode,
                  'number' => $localNumber,
                  'message' => 'Número de Lima',
                  'html' => '<a href="tel:+51' . $cityCode . $localNumber . '">(01) ' . $localNumber . '</a>'                  
                );
              }
            }else{
              $phoneLocal2 = null;
            }

            if( $dir_phone_direct !== '' ){
              $pos1 = strpos($dir_phone_direct, "-");
        
              if ( $pos1 === false ) {
                $phoneDirect = array(
                  'number' => $dir_phone_direct,
                  'html' => '<a href="tel:+51' . $dir_phone_direct . '">' . $dir_phone_direct . '</a>'                  
                );
              }
      
              if ( $pos1 === 1 ) {
                $cityCode = substr($dir_phone_direct, 0, $pos1);
                $localNumber = substr($dir_phone_direct, ($pos1 + 1)); 
                
                $phoneDirect = array(
                  'code' => $cityCode,
                  'number' => $localNumber,
                  'message' => 'Número de Lima',
                  'html' => '<a href="tel:+511' . $localNumber . ';' . $ext . '">(01) ' . $localNumber . ' axo. ' . $ext . '</a>'
                );
              }

            }else{
              $phoneDirect = null;
            }
            

            $terms = wp_get_object_terms(get_the_ID(), 'grupos');
            
            $tempTerm = $terms[0]->name;
            $loopTerm = $terms[0]->name;
            $loopSlug = $terms[0]->slug;
            
            $dir_imagen = ( get_field('dir_imagen') ) ? get_field('dir_imagen')['url'] : \App\asset_path('images/avatar--default--12x13.jpg');
            $dir_responsable = ( get_field('dir_responsable') ) ? get_field('dir_responsable') : 'No designado';
            
            $the_mail = get_field('dir_correo');
            ($the_mail !== "") ? $dir_correo = '<a href="mailto:' . antispambot( $the_mail ) . ' ">' . antispambot( $the_mail ) . '</a>' : $dir_correo = null; 
            
            $postClass = get_post_class( get_the_ID() );

            if (wp_get_post_parent_id(get_the_ID()) === 0){
              $parentClass = 'father';
            }else{
              $parentClass = 'child';
            }

            array_push($postClass, $parentClass);
            

            if( $tempTerm !== $group && $group !== ""){
              $isClose = true;
              $closeTag = '</div>';
            }

            if( $group !== $loopTerm ){
              $isOpen = true;
              $openTag = '<div>';

              $group = $loopTerm;
            }

            $objectToSend->response[] = array(
                "title"           => get_the_title(),
                "slug"            =>  get_post_field( 'post_name', get_post() ),
                "dir_responsable"        => $dir_responsable,
                "dir_resolucion"    => get_field('dir_resolucion'),
                "dir_situacion"   => get_field('dir_situacion'),
                "dir_cargo"   => get_field('dir_cargo'),
                "dir_correo"   => $dir_correo,
                "dir_cv"   => get_field('dir_cv'),
                "dir_dji"   => get_field('dir_dji'),
                "dir_imagen"   => $dir_imagen,
                "sede" => $sede,
                "address" => $address['address'],
                "isOpen" => $isOpen,
                "isClose" => $isClose,
                "closeTag" => $closeTag,
                "openTag" => $openTag,
                "loopSlug" => $loopSlug,
                "loopTerm" => $loopTerm,
                "post_class" =>  join( ' ', $postClass ),
                "phoneExt" => $phoneExt,
                "phoneLocal" => $phoneLocal,
                "phoneLocal2" => $phoneLocal2,
                "phoneDirect" => $phoneDirect,
                "html"            => ''
            );
        }

        $objectToSend->bError = false;
        $objectToSend->vMensaje = $the_dir_query;
        echo json_encode($objectToSend);
        /* Restore original Post Data */
        wp_reset_postdata();
    } else {
        $objectToSend->bError = true;
        $objectToSend->vMensaje = 'No se encontraron resultados';
        //$objectToSend->vMensaje = $the_dir_query;
        echo json_encode($objectToSend);
        wp_reset_postdata();
    }
    //var_dump($the_dir_query);
    wp_die();
}
