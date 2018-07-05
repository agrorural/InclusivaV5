{{--
  Template Name: Documentos
--}}

@extends('layouts.app')

@section('content')
    {{-- <nav class="wp-pagenavi nav nav-pills justify-content-center"></nav>
    <div class="search-result"></div> --}}



  <div class="search-result-container">
    <div class="wp-pagenavi-container pagination-container container">
      <nav class="pagination wp-pagenavi"></nav>
    </div>
    
    <div class="container result-container">
        @include('partials.content-placeholder')
        <div class="search-result content-container"></div>
    </div>
  </div>
@endsection
