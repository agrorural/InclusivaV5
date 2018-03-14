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
                'text' => get_field('banner__txt'),
            ]
        );

        return  $data;
    }
}
