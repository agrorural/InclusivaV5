<?php

namespace App;

use Sober\Controller\Controller;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_category()) {
          return single_cat_title();
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

    public static function description()
    {
      if ( is_page_template() || is_page( 'direcciones-zonales' ) ){
        while( have_posts() ) : the_post();
          $the_content = the_content();
        endwhile; 
        
        wp_reset_query();

        return $the_content;
      }
      
      if( is_category() ){
        return category_description();
      }
      return;
    }

    public static function Banner()
    {
        $data = array(
            [
                'ht' => get_field('banner__ht'),
                'ht_link' => get_field('banner__ht_url'),
                'is_popover' => get_field('banner__pop'),
                'url' => get_field('banner__url'),
                'date' => get_field('banner__vig'),
                'button_title' => get_field('banner__btn_title'),
                'is_text' => get_field('banner__txt'),
            ]
        );

        return  $data;
    }

    public static function share()
    {
      $webURL = urlencode( wp_get_shortlink() );
      $postTitle = str_replace( ' ', '%20', get_the_title());
      $ShareContent = '';

      // Construct sharing URL without using any script
      $twitterURL = 'https://twitter.com/intent/tweet?text='.$postTitle.'&amp;url='.$webURL.'&amp;via=agrorural';
      $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$webURL;
      $whatsappURL = 'whatsapp://send?text='.$postTitle . ' ' . $webURL;
      $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$webURL.'&amp;title='.$postTitle;

      $ShareContent .= '<nav class="entry-share">';
      $ShareContent .= '<a class="fb" href="' . $facebookURL . '" title="' . $postTitle . '" target="_blank">';
      $ShareContent .= '<i class="fab fa-facebook-f"></i>';
      $ShareContent .= '</a>';
      $ShareContent .= '<a class="tw" href="' . $twitterURL . '" title="' . $postTitle . '" target="_blank">';
      $ShareContent .= '<i class="fab fa-twitter"></i>';
      $ShareContent .= '</a>';
      $ShareContent .= '<a class="li" href="' . $linkedInURL . '" title="' . $postTitle . '" target="_blank">';
      $ShareContent .= '<i class="fab fa-linkedin"></i>';
      $ShareContent .= '</a>';
      $ShareContent .= '<a class="d-block d-sm-none wa" href="' . $whatsappURL . '" title="' . $postTitle . '" target="_blank">';
      $ShareContent .= '<i class="fab fa-whatsapp"></i>';
      $ShareContent .= '</a>';
      $ShareContent .= '</nav>';

      return $ShareContent;
    }
}
