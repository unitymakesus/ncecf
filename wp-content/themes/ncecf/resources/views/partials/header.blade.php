<header class="banner">
  <div class="container">
    <a class="brand" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
    <div class="left">
      <img src="http://ncinitiative.local/wp-content/uploads/2018/01/download.png" alt="Logo">
      <!-- NOTE: Find WP Helper Method for Image -->
    </div><br>
    <div class="right">
      {!! get_search_form(false) !!}
      <button type="button">Donate</button>
      <!-- NOTE: Find WP tool / Donately Plugin -->
    </div>
    <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation',
                         'menu_class' => 'nav']) !!}
      @endif
    </nav>
  </div>
</header>
