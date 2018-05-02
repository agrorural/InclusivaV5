@extends('layouts.app')

@section('content')
  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif
<div class="row">
  @while (have_posts()) @php(the_post())
    <div class="col-6 col-sm-4 col-lg-3">
      @include('partials.content-'.get_post_type())
    </div>  
  @endwhile
</div>

{!! wp_pagenavi() !!}
@endsection