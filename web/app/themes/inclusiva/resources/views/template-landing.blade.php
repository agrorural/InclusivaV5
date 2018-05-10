{{--
  Template Name: Página de Lanzamiento
--}}
{{-- @debug --}}

@php
  ( $feed === "" || $feed === false ) ? $the_posts = null : $the_posts = Landing::query('post', 'post_tag', $feed->slug);
  ( $banners === "" || $banners === false ) ? $the_banners = null : $the_banners = Landing::query('banners', 'posiciones', $banners->slug);
  ( $feed === "" || $feed === false ) ? $the_videos = null : $the_videos = Landing::query('post', 'post_format', $feed->slug, -1);

  // var_dump( $has_menu );
@endphp


@extends('layouts.landing')

@section('content')
  <h1>{!! App::title() !!}</h1>
  {!! App::description() !!}
@endsection

@section('content-feed')
<div class="row">
    @if($the_posts !== null && $the_posts->have_posts())
      @while($the_posts->have_posts()) @php($the_posts->the_post())
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
  @if($the_banners !== null  && $the_banners->have_posts())
    <section id="banners" class="section">
      <div class="container">
          <header class="section-header">
            <h2 class="section-title">Enlaces de Interés</h2>
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
  @if($the_videos !== null  && $the_videos->have_posts())
    <section id="videos" class="section">
      <div class="container">
          <header class="section-header">
            <h2 class="section-title">Videos</h2>
          </header>

          <div id="video__slider" class="swiper-container loading">
            <div class="swiper-wrapper">
          
              @while($the_videos->have_posts()) @php($the_videos->the_post())
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