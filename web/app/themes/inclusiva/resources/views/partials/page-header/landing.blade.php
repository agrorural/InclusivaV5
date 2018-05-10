<div class="page-header">
  @if( $logo )
    <img src="{!! $logo["sizes"]["thumbnail"] !!}" alt="" class="fluid-img mb-5">
  @endif
  
  @if( $get_parent === null )
    <h1>{!! App::title() !!}</h1>
  @else
    <h1>{!! get_the_title( $get_parent ) !!}</h1>
  @endif
  
  @if( $get_parent === null )
    {!! App::description() !!}
  @endif
</div>
{{-- @debug --}}
{{-- 
@php(var_dump(get_the_title($get_parent))) --}}