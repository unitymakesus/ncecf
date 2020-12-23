<div class="has-background-image action-map-home-hero" style="background-image: url('{!! get_the_post_thumbnail_url($id, 'large') !!}')">
  <div class="action-map-circle-blue">
    @php(the_content())
  </div>
</div>
<section>
  <div class="row half-circle-blue">
    <div class="col m8 offset-m2 center-align">

      @php
        $action_map_vision = get_field('action_map_vision');
      @endphp
      <div class="action-map-vision center-align">
        <h2>Our <strong>Vision</strong></h2>
        {{ $action_map_vision }}
      </div>
    </div>
  </div>
</section>
<section class="container action-map-intro">
  <div class="row">
    @php
      $action_map_intro = get_field('action_map_intro');

    @endphp
    <div class="col m6 action-map-intro-callout">
        {!! $action_map_intro['action_map_intro_callout'] !!}
    </div>
    <div class="col m6">
      {!! $action_map_intro['action_map_intro_text'] !!}
    </div>
  </div>
</section>
@php
  $action_map_instructions = get_field('action_map_instructions');
@endphp
<section class="action-map-instruct" style="background-image: url('{!! $action_map_instructions['action_map_instructions_background_image']['sizes']['large'] !!}')">
  <div class="container">
    <div class="row">

      <div class="col m6 action-map-instructions">
          {!! $action_map_instructions['action_map_instructions_text'] !!}
      </div>

    </div>
  </div>
</section>
<section id="expectations" class="container">
  <div class="row">
    <div class="col l12">
      <h2 class="center-align">
        <strong>
          The Map is organized by Expectations, Actions and Initiatives.
        </strong>
      </h2>
      <p class="center-align">Begin exploring by selecting one of four Expectations below. These are what Pathways expects of North Carolina’s child and family systems to support each child’s healthy growth and development:</p>

    <div id="expectations-wheel">
      {!! do_shortcode('[list-expectations]') !!}
    </div>

    </div>
  </div>
</section>
<section id="pathways-cta">
  <div class="container">
  <div class="row">
    <div class="col l12">
      @php
        $action_map_summary = get_field('action_map_summary');
      @endphp
      {!! $action_map_summary !!}
    </div>
  </div>
</div>
</section>
