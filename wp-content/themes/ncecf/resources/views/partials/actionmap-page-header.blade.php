@php ($id = get_the_id())

<div class="actionmap-navigation">
    <div class="row pathways-announcement">
      <div class="col m12">
        <a href="{{ site_url() }}/initiative/pathways-to-grade-level-reading/">Learn More About Pathways to Grade-Level Reading</a>
      </div>
    </div>
    <div class="row pathways-navigation">
      <div class="col m2 pathways-logo">
      <a href="{{ site_url() }}/pathways-action-map-home/">  <img src="{!! get_stylesheet_directory_uri() !!}/assets/images/action-map/pathways-logo.png" /></a>
      </div>
      <div class="col m10">
        {!! wp_nav_menu(['menu' => 'Action Map Header', 'menu_class' => '', 'menu_id' => 'action_map_header']) !!}
      </div>
    </div>
</div>
