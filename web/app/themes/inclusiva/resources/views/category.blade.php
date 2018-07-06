@extends('layouts.category')

@section('content-category')
{{-- @debug
@php(var_dump($phone_local)) --}}

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdSKjFYyQMK1yLHdvbblCjR_RHY5A6yUs"></script>
<script src="https://www.google.com/jsapi"></script>
<script>
  (function($) {
    /*
    *  new_map
    *
    *  This function will render a Google Map onto the selected jQuery element
    *
    *  @type	function
    *  @date	8/11/2013
    *  @since	4.3.0
    *
    *  @param	$el (jQuery element)
    *  @return	n/a
    */

    function new_map( $el ) {
      
      // var
      var $markers = $el.find('.marker');
      
      
      // vars
      var args = {
        zoom		: 16,
        center		: new google.maps.LatLng(0, 0),
        mapTypeId	: google.maps.MapTypeId.ROADMAP
      };
      
      
      // create map	        	
      var map = new google.maps.Map( $el[0], args);
      
      
      // add a markers reference
      map.markers = [];
      
      
      // add markers
      $markers.each(function(){
        
          add_marker( $(this), map );
        
      });
      
      
      // center map
      center_map( map );
      
      
      // return
      return map;
      
    }

    /*
    *  add_marker
    *
    *  This function will add a marker to the selected Google Map
    *
    *  @type	function
    *  @date	8/11/2013
    *  @since	4.3.0
    *
    *  @param	$marker (jQuery element)
    *  @param	map (Google Map object)
    *  @return	n/a
    */

    function add_marker( $marker, map ) {

      // var
      var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

      // create marker
      var marker = new google.maps.Marker({
        position	: latlng,
        map			: map
      });

      // add to array
      map.markers.push( marker );

      // if marker contains HTML, add it to an infoWindow
      if( $marker.html() )
      {
        // create info window
        var infowindow = new google.maps.InfoWindow({
          content		: $marker.html()
        });

        // show info window when marker is clicked
        google.maps.event.addListener(marker, 'click', function() {

          infowindow.open( map, marker );

        });
      }

    }

    /*
    *  center_map
    *
    *  This function will center the map, showing all markers attached to this map
    *
    *  @type	function
    *  @date	8/11/2013
    *  @since	4.3.0
    *
    *  @param	map (Google Map object)
    *  @return	n/a
    */

    function center_map( map ) {

      // vars
      var bounds = new google.maps.LatLngBounds();

      // loop through all markers and create bounds
      $.each( map.markers, function( i, marker ){

        var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

        bounds.extend( latlng );

      });

      // only 1 marker?
      if( map.markers.length == 1 )
      {
        // set center of map
          map.setCenter( bounds.getCenter() );
          map.setZoom( 16 );
      }
      else
      {
        // fit to bounds
        map.fitBounds( bounds );
      }

    }

    /*
    *  document ready
    *
    *  This function will render each map when the document is ready (page has loaded)
    *
    *  @type	function
    *  @date	8/11/2013
    *  @since	5.0.0
    *
    *  @param	n/a
    *  @return	n/a
    */
    // global var
    var map = null;

    $(document).ready(function(){

      $('.acf-map').each(function(){

        // create map
        map = new_map( $(this) );

      });

    });

    })(jQuery);
</script>


<div class="categoryInfo">
  <div class="info">
    <div class="info-container" style="background-image: url({{$bg}})">
      <div class="media">
        <img class="mr-3" src="{{$directory->photo}}" alt="{{$directory->director}}" width="55">
        <div class="media-body">
          <h6>{{$directory->director}}</h6>
         <p>{{$directory->position}}</p>
        </div>
      </div>
      <ul class="list-group list-group-flush">
        @if($phone_local || $phone_direct || @phone_ext) 
          <li class="list-group-item">
            @if($phone_local->number) <a href="tel:+51{{$phone_local->code}}{{$phone_local->number}}"><i class="fas fa-phone"></i> +51 {{$phone_local->code}} {{$phone_local->number}}</a> <br> @endif
            @if($phone_local_two->number) <a href="tel:+51{{$phone_local_two->code}}{{$phone_local_two->number}}"><i class="fas fa-phone"></i> +51 {{$phone_local_two->code}} {{$phone_local_two->number}}</a>  <br> @endif
            @if($phone_direct->number)
              @php($directLenght = strlen($phone_direct->number))
              
              @if($directLenght > 7)
                <a href="tel:+51{{$phone_direct->number}}"><i class="fas fa-phone"></i> +51 {{$phone_direct->number}}</a>  <br> 
              @else
                <a href="tel:+511{{$phone_direct->number}}">+511 {{$phone_direct->number}}</a>  <br>           
              @endif
            @endif
            @if($phone_ext->number)
              @if($phone_ext->ext)
                <a href="tel:+511{{$phone_ext->number}};{{$phone_ext->ext}}"><i class="fas fa-phone"></i> +51 1 {{$phone_ext->number}} axo. {{$phone_ext->ext}}</a> 
              @endif
              @if($phone_ext->ext2)
              <br>
                <a href="tel:+511{{$phone_ext->number}};{{$phone_ext->ext2}}"><i class="fas fa-phone"></i> +51 1 {{$phone_ext->number}} axo. {{$phone_ext->ext2}}</a> 
              @endif
            @endif
          </li> 
        @endif
      </ul>
    </div>
  </div>
  <div class="map">
    <div class="acf-map">
      <div class="marker" data-lat="{{ $address['lat'] }}" data-lng="{{ $address['lng'] }}"></div>
    </div>
    @if($address) <li class="list-group-item">{{$address['address']}}</li> @endif
  </div>
</div>

@endsection

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