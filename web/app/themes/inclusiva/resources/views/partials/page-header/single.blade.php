
{{-- @php(var_dump($category)) --}}

<div class="page-header">
<h6 class="entry-category"><a href="{!! $category->url !!}">{{ $category->name }}</a></h6>
  <h1>{!! App::title() !!}</h1>
</div>

{{-- @debug --}}