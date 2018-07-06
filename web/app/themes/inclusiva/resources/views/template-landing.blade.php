{{--
  Template Name: Página de Lanzamiento
--}}
{{-- @debug --}}

@php
  ( $feed === "" || $feed === false ) ? $the_posts = null : $the_posts = Landing::query('post', 'post_tag', $feed->slug);
  ( $banners === "" || $banners === false ) ? $the_banners = null : $the_banners = Landing::query('banners', 'posiciones', $banners->slug);
  ( $docs === "" || $docs === false ) ? $the_docs = null : $the_docs = Landing::query('documentos', 'tipos', $docs->slug, -1);
  ( $feed === "" || $feed === false ) ? $the_videos = null : $the_videos = Landing::query('post', 'post_format', $feed->slug, -1);

  //var_dump( $the_docs );
@endphp


@extends('layouts.landing')

@section('content')
  <h1>{!! App::title() !!}</h1>
  {!! App::description() !!}
@endsection

@section('content-feed')
  <section id="feed" class="wrap">
    <div class="container">
      <header class="section-header">
        <h2 class="section-title">Entradas</h2>
      </header>
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
    </div>
    
  </section>
@endsection

@section('content-banners')
  @if($the_banners !== null  && $the_banners->have_posts())
    <section id="banners" class="wrap">
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

@section('content-docs')
  <section id="docs" class="wrap">
    <div class="container">
      <header class="section-header">
        <h2 class="section-title">Documentos</h2>
      </header>
      <div class="row">
        @if($the_docs !== null && $the_docs->have_posts())
          @while($the_docs->have_posts()) @php($the_docs->the_post())
            <div class="content-container">
              @include('partials.content-'.get_post_type())
            </div>
          @endwhile

        @php(wp_reset_postdata())
        
        @endif
      
      </div> 
    </div>
    
  </section>
@endsection

@section('content-videos')
  @if($the_videos !== null  && $the_videos->have_posts())
    <section id="videos" class="wrap">
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