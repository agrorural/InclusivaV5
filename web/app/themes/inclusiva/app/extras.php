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
	
	$api['key'] = 'AIzaSyDdSKjFYyQMK1yLHdvbblCjR_RHY5A6yUs';
	
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
    is_single(),
    is_404(),
    is_page_template( 'views/template-documentos.blade.php' ),
  ]);

  return $display;
});

/**
 * Ajax para Omnisearch
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
            
            $objectToSend->response[] = array(
                "id"              =>  get_the_ID(),
                "title"           => get_the_title(),
                "slug"            =>  get_post_field( 'post_name', get_post() ),
                "permalink"       => get_permalink(),
                "excerpt"         => get_the_excerpt(),
                "date"            => get_the_date(),
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
            
            $terms = wp_get_object_terms(get_the_ID(), 'grupos');
            $tempTerm = $terms[0]->name;
            $loopTerm = $terms[0]->name;
            $loopSlug = $terms[0]->slug;
            $dir_imagen = ( get_field('dir_imagen') ) ? get_field('dir_imagen')['url'] : \App\asset_path('images/avatar--default.jpg');
            $snt_correo = antispambot( get_field('dir_correo') );
            $dir_correo = '<a href="mailto:' . $snt_correo . ' ">' . $snt_correo . '</a>';

            if (wp_get_post_parent_id(get_the_ID()) === 0){
              $parentClass = 'father';
            }else{
              $parentClass = 'child';
            }
            
            $isOpen = false;
            $isClose = false;

            if( $tempTerm !== $group && $group !== ""){
              $isClose = true;
            }

            if( $group !== $loopTerm ){
              $isOpen = true;

              $group = $loopTerm;
            }

            $objectToSend->response[] = array(
                "id"              =>  get_the_ID(),
                "title"           => get_the_title(),
                "slug"            =>  get_post_field( 'post_name', get_post() ),
                "dir_responsable"        => get_field('dir_responsable'),
                "dir_resolucion"    => get_field('dir_resolucion'),
                "dir_situacion"   => get_field('dir_situacion'),
                "dir_cargo"   => get_field('dir_cargo'),
                "dir_correo"   => $dir_correo,
                "dir_cv"   => get_field('dir_cv'),
                "dir_dji"   => get_field('dir_dji'),
                "dir_imagen"   => $dir_imagen,
                "isOpen" => $isOpen,
                "isClose" => $isClose,
                "loopSlug" => $loopSlug,
                "loopTerm" => $loopTerm,
                "parentClass" => $parentClass,
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
