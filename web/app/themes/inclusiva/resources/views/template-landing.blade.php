{{--
  Template Name: Página de Lanzamiento
--}}

@php
  $posts = Landing::query('post', 'post_tag', $feed->slug);
  $the_banners = Landing::query('banners', 'posiciones', $banners->slug);
  $videos = Landing::query('post', 'post_format', $feed->slug, -1);
@endphp



@extends('layouts.landing')

@section('content')
  <div class="row">

    @if($posts->have_posts())
      @while($posts->have_posts()) @php($posts->the_post())
        <div class="content-container">
          @include('partials.content-'.get_post_type())
        </div>
      @endwhile

    @php(wp_reset_postdata())
    
    @endif
  
  </div> 
  
  <div class="row d-flex justify-content-center">
    <div class="content-container">
        <a href="{!! get_tag_link($feed->term_id) !!}" class="btn btn-outline-primary btn-block">Todas las entradas</a>
    </div>
  </div>
@endsection

@section('content-banners')
  @if($the_banners->have_posts())
    <section class="section">
      <div class="container">
          <header class="section-header">
            <h2 class="section-title">Banners</h2>
          </header>

          <div id="banner__slider" class="swiper-container loading">
            <div class="swiper-wrapper">
          
              @while($the_banners->have_posts()) @php($the_banners->the_post())
                @include('partials.content-slide')
              @endwhile
      
              @php(wp_reset_postdata())
        
            </div>

            <div id="banner-arrow-left" class="swiper-button-prev swiper-button-white"></div>
            <div id="banner-arrow-right" class="swiper-button-next swiper-button-white"></div>
          </div>
      </div>
    </section>
  @endif
@endsection

@section('content-videos')
  @if($videos->have_posts())
    <section class="section">
      <div class="container">
          <header class="section-header">
            <h2 class="section-title">Videos</h2>
          </header>

          <div id="video__slider" class="swiper-container loading">
            <div class="swiper-wrapper">
          
              @while($videos->have_posts()) @php($videos->the_post())
                @include('partials.content-slide')
              @endwhile
          
              @php(wp_reset_postdata())
        
            </div>

            <div id="video-arrow-left" class="swiper-button-prev swiper-button-white"></div>
            <div id="video-arrow-right" class="swiper-button-next swiper-button-white"></div>
          </div>
      </div>
    </section>
  @endif
@endsection