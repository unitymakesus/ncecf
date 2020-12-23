<div class="acmp-search-box">
  <form role="search" method="get" class="search-form" action="<?php echo get_permalink(11752); ?>">
    <label>
      <span class="screen-reader-text">Search for:</span>
      <input type="search" class="search-field" placeholder="Search The Action Map" value="" name="swpquery" title="Search for:">
    </label>
    <input type="submit" class="search-submit" value="Search">
  </form>
</div>

{!! wp_nav_menu([
  'menu' => 'Action Map Sidebar',
  'menu_id' => 'action_map_sidebar',
  ]) !!}
