@extends('layouts.home')

@section('content')
  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif
  
  @php($postCount = 1)
  
    <div class="row">
      @while (have_posts()) @php($postCount++) @php(the_post())
      
        @if($postCount == 2 && !is_paged())
          
            <div class="content-featured-container">
              @include('partials.content-featured-'.get_post_type())
            </div>
        
        @else
          
            <div class="content-container">
              @include('partials.content-'.get_post_type())
            </div>
        
        @endif

      @endwhile
    </div>
    
  {!! wp_pagenavi() !!}

@endsection