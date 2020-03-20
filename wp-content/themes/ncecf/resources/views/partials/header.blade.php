<a href="#content" class="screen-reader-text">Skip to content</a>
<header class="banner" role="banner">
  <nav role="navigation">
    <div class="container">
      <a class="logo left" href="{{ home_url('/') }}" rel="home">
        @if (has_custom_logo())
          @php
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $logo = wp_get_attachment_image_src( $custom_logo_id , 'ncecf-logo' );
            $logo_2x = wp_get_attachment_image_src( $custom_logo_id, 'ncecf-logo-2x' );
          @endphp
          <img src="{{ $logo[0] }}"
               srcset="{{ $logo[0] }} 1x, {{ $logo_2x[0] }} 2x"
               alt="{{ get_bloginfo('name', 'display') }}"
               width="{{ $logo[1] }}" height="{{ $logo[2] }}" />
        @else
          {{ get_bloginfo('name', 'display') }}
        @endif
      </a>

      <div class="utility right">
        @if (has_nav_menu('header_social'))
          {!! wp_nav_menu(['theme_location' => 'header_social', 'menu_class' => 'social-icons right-align', 'menu_id' => 'header-social']) !!}
        @endif
        {!! get_search_form(false) !!}
        <div class="right-align">
          <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=LY3HR422QLMA8" target="_blank" rel="noopener" class="btn btn-blue">Donate</a></div>
      </div>
    </div>

    <div class="navbar">
      @if (has_nav_menu('primary_navigation'))
        <div class="menu-trigger-wrapper hide-on-large-only">
          <input type="checkbox" name="menu-trigger" id="menu-trigger" value="true" />
          <label for="menu-trigger"><i class="material-icons" aria-label="Show navigation menu">menu</i></a>
        </div>
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'navbar-menu flex flex-center space-between container']) !!}
      @endif
    </div>
  </nav>
</header>
@if ( !is_front_page() && function_exists( 'breadcrumb_trail' ) )
  <div class="breadcrumbs">
    <div class="container">
      @php (breadcrumb_trail())
    </div>
  </div>
@endif
