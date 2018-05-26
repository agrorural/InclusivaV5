<header class="super-header">
  <div class="container">
    <nav class="">
      @if (has_nav_menu('super_navigation_left'))
        {!! wp_nav_menu(['theme_location' => 'super_navigation_left', 'depth' => 1, 'menu_class' => 'left-links', 'container' => '']) !!}
      @endif
      @if (has_nav_menu('super_navigation_right'))
        {!! wp_nav_menu(['theme_location' => 'super_navigation_right', 'depth' => 1, 'menu_class' => 'right-links', 'container' => '']) !!}
      @endif 
    </nav>
  </div>
</header>

<header class="branding">
    <div class="container">
      <div class="branding__nav">
        <nav class="nav">
          <a id="minagri" href="http://www.minagri.gob.pe" target="_blank">
            <img src="@asset('images/minagri__logo.svg')" style="height:45px !important" class="img-fluid" alt="Minagri">
          </a>
          <a id="agro_rural" href="{{ home_url('/') }}">
            <svg version="1.1" id="agro_rural__logo" class="color" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 250 91.2" xml:space="preserve" width="150px" height="55px">
              <g id="leafs">
                <path class="leaf-1" d="M243.7,19.5c-36.5-12.7-76-17.7-135.9,30.9C168.2,0.7,215.5-14.9,243.7,19.5z"/>
                <path class="leaf-2" d="M243.7,32.3c-36.5-16.1-76-24.9-135.9,18.1C168.2,6.4,215.5-4.7,243.7,32.3z"/>
                <path class="leaf-3" d="M243.7,45c-36.5-19.5-76-32-135.9,5.4C168.2,12,215.5,5.3,243.7,45z"/>
                <path class="leaf-4" d="M243.7,51.6c-36.5-18.5-76-30.9-135.9-1.1C168.2,19.9,215.5,16.1,243.7,51.6z"/>
              </g>
              <g id="letters">
                <path class="letter-a" d="M41.1,71L27.4,39.1c-0.2-0.4-0.3-0.8-0.3-1.1h-5.9c0,0.4-0.1,0.8-0.3,1.3L7.5,71c-0.2,0.5-0.5,0.9-0.8,1.4h3.9
                  c0-0.5,0.1-1,0.2-1.4l3.9-9.4h15.2l3.9,9.4c0.2,0.5,0.3,1,0.3,1.4h8C41.6,71.8,41.3,71.4,41.1,71z M15.8,59.1l6.4-15.6l6.6,15.6
                  H15.8z"/>

                <path class="letter-g" d="M65.6,58.4c0-0.5,0.1-0.9,0.2-1.4H60c0.1,0.4,0.2,0.9,0.2,1.4v11c-1.6,0.8-3.4,1.2-5.1,1.2
                  c-3.1,0-5.5-0.9-7.4-2.6c-2.2-2.1-3.4-5.2-3.4-9.4c0-2,0.3-3.9,0.9-5.6c0.4-1.4,1.3-2.7,2.6-3.9c2-1.9,4.6-2.8,7.9-2.8
                  c3,0,6,0.9,9.1,2.6v-3.5c-3.3-1-6.4-1.5-9.3-1.5c-4.8,0-8.7,1.1-11.6,3.2c-3.6,2.6-5.4,6.4-5.4,11.3c0,2.8,0.6,5.2,1.7,7.3
                  c1.3,2.4,3.3,4.3,5.9,5.5c2.2,1,5,1.6,8.5,1.6c1.9,0,3.6-0.1,4.9-0.4c1.4-0.2,3.6-0.8,6.5-1.6c-0.2-0.5-0.3-1.1-0.3-1.7L65.6,58.4
                  L65.6,58.4z"/>

                <path class="letter-r" d="M89.9,71.3l-11-12.1c1.5-0.2,2.7-0.5,3.7-0.8c3.5-1.1,5.3-3.3,5.3-6.4c0-1.4-0.4-2.7-1.2-3.8s-1.8-2-3.2-2.6
                  c-1.7-0.8-3.8-1.2-6.1-1.2H67.3c0.1,0.4,0.2,0.9,0.2,1.3v25.4c0,0.5-0.1,1-0.2,1.4h6c-0.1-0.4-0.2-0.9-0.2-1.4V59.4l10.1,11.8
                  c0.3,0.4,0.5,0.8,0.7,1.2h7.3C90.8,72.2,90.3,71.8,89.9,71.3z M73.1,57.8V46.4h2.3c2,0,3.5,0.4,4.6,1.2c1.5,1.1,2.2,2.6,2.2,4.5
                  c0,2.1-0.9,3.6-2.7,4.7c-1.1,0.6-2.4,1-3.9,1H73.1z"/>

                <path class="letter-o" d="M115.8,47.3c-2.9-2.3-6.8-3.4-11.7-3.4c-7,0.1-11.8,2.2-14.4,6.5c-1.3,2.2-2,4.8-2,7.7c0,4.7,1.4,8.3,4.2,10.9
                  c2.7,2.6,6.8,3.8,12.1,3.8c5.1,0,9.1-1.2,12-3.6c3-2.5,4.5-6.2,4.5-10.9C120.5,53.5,118.9,49.8,115.8,47.3z M114,63.4
                  c-0.4,1.4-1,2.6-1.9,3.7c-1.8,2.3-4.5,3.5-8,3.5c-7,0-10.5-4.2-10.5-12.5c0-3.6,0.8-6.4,2.4-8.6c1.7-2.3,4.4-3.5,8.1-3.5
                  c7,0.1,10.5,4.2,10.5,12.4C114.6,60.4,114.4,62,114,63.4z"/>

                <path class="letter-r" d="M148.7,71.1l-13.4-14.9c1.9-0.3,3.4-0.6,4.5-1c4.3-1.4,6.5-4,6.5-7.9c0-1.7-0.5-3.3-1.5-4.6
                  c-0.9-1.3-2.3-2.4-3.9-3.2c-2.1-1-4.6-1.5-7.4-1.5h-12.4c0.2,0.5,0.3,1.1,0.3,1.6v31.1c0,0.7-0.1,1.2-0.3,1.7h7.4
                  c-0.2-0.5-0.3-1.1-0.3-1.7V56.5L140.6,71c0.4,0.5,0.7,1,0.9,1.5h8.9C149.8,72.1,149.2,71.7,148.7,71.1z M128.2,54.6v-0.1v-14h2.8
                  c2.4,0,4.3,0.5,5.6,1.5c1.8,1.4,2.7,3.2,2.7,5.6c0,2.5-1.1,4.4-3.3,5.8c-1.3,0.8-2.9,1.2-4.8,1.2H128.2z"/>
                
                <path class="letter-u" d="M171.6,45.7v17.1c0,2.5-0.8,4.4-2.4,5.7c-1.6,1.3-3.9,2-6.9,2c-3.5,0-5.9-1-7.5-2.9c-0.9-1.2-1.4-2.6-1.4-4.2
                  V45.7c0-0.5,0.1-0.9,0.2-1.3h-6c0.1,0.4,0.2,0.9,0.2,1.4v17.7c0,1.7,0.4,3.2,1.3,4.6c0.9,1.4,2.1,2.5,3.6,3.3c1.9,1,4.6,1.6,8,1.6
                  c2.4,0,4.5-0.3,6.5-0.8c2.1-0.6,3.7-1.6,5-3.2s1.9-3.5,1.9-5.7V45.7c0-0.5,0.1-1,0.2-1.4h-2.9C171.5,44.7,171.6,45.1,171.6,45.7z"
                  />
                
                <path class="letter-ra" d="M225.1,71.2l-11.1-26c-0.1-0.3-0.2-0.6-0.2-0.9h-4.9c0,0.3-0.1,0.7-0.2,1l-10.6,25.3l-10.3-11.4
                  c1.5-0.2,2.7-0.5,3.7-0.8c3.5-1.1,5.3-3.3,5.3-6.4c0-1.4-0.4-2.7-1.2-3.8c-0.8-1.1-1.8-2-3.2-2.6c-1.7-0.8-3.8-1.2-6.1-1.2h-10.1
                  c0.1,0.4,0.2,0.9,0.2,1.3v25.4c0,0.5-0.1,1-0.2,1.4h6c-0.1-0.4-0.2-0.9-0.2-1.4V59.4l10.1,11.8c0.3,0.4,0.5,0.8,0.7,1.2h4.3h2.9
                  h0.2c0-0.4,0.1-0.8,0.2-1.2l3.2-7.6H216l3.2,7.6c0.2,0.4,0.2,0.8,0.2,1.2h6.5C225.5,72,225.3,71.6,225.1,71.2z M182,57.8V46.4h2.3
                  c2,0,3.5,0.4,4.6,1.2c1.5,1.1,2.2,2.6,2.2,4.5c0,2.1-0.9,3.6-2.7,4.7c-1.1,0.6-2.4,1-3.9,1H182z M204.6,61.5l5.2-12.7l5.4,12.7
                  H204.6z"/>
                
                <path class="letter-l" d="M241.6,70.2h-9.4V45.7c0-0.5,0.1-0.9,0.2-1.4h-6c0.1,0.4,0.2,0.9,0.2,1.4v25.4c0,0.5-0.1,0.9-0.2,1.3h16.9V70
                  C242.8,70.1,242.3,70.1,241.6,70.2z"/>
              </g>
              <g id="base">
                  <path class="leaf-base" d="M249.4,90.7C182.5,81,110.3,74.4,0.5,90.1C111.3,74,197.9,72,249.4,90.7z"/>
                </g>
            </svg>
          </a>
        </nav>
      </div>  
    </div>
</header>

<header class="primary-nav">
    <div class="container-boxed">
      <div id="primary_navigation">
        @if (has_nav_menu('primary_navigation'))
            
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'depth' => 2, 'container' => '', 'menu_class' => 'navbar-nav', 'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback', 'walker' => new WP_Bootstrap_Navwalker()]) !!}

        @endif
        <div class="searchBox">
          <form class="searchForm">
            <div class="input-group form-group">
              <div class="input-group-prepend">
                  <select class="selectpicker" multiple>
                      @foreach(App::postTypeObj() as $type)
                        <option value="{{$type['name']}}">{{$type['label']}}</option>
                      @endforeach
                  </select>
              </div>
              <input type="text" class="form-control" id="formSearch">
              <label for="formSearch">Ingrese su búsqueda y presione [enter]</label>
              <div class="input-group-append">
                <button id="cleanForm" class="btn btn-link" type="button"><i class="fas fa-redo"></i></button>
              </div>
            </div>
            <button id="showForm" class="btn btn-link"><i class="fas fa-search"></i></button>
          </form>
        </div>
      </div>
    </div>
</header>

<aside id="omnisearch">
  <div class="container">
    <h2 class="text-center mt-5">Busque en todo el sitio</h2>
    
    <div class="search-result-container">
      <div class="wp-pagenavi-container pagination-container">
        <nav class="pagination wp-pagenavi"></nav>
      </div>

      @include('partials.content-placeholder')

       <div class="search-result content-container"></div>
        
      <div class="wp-pagenavi-container pagination-container">
        <nav class="pagination wp-pagenavi"></nav>
      </div>
    </div>
  </div>
</aside>