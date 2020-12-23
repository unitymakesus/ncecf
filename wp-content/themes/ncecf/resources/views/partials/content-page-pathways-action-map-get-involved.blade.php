<div class="has-background-image page-header action-map-get-involved" style="background-image: url('{!! get_the_post_thumbnail_url($id, 'large') !!}')">
  <div class="actionmap-expectations-header">
    @php(the_content())
  </div>
  <div class="blue-circle">

  </div>
</div>
<section class="container">
  <div class="row half-circle-blue">
    <div class="col m8 offset-m2">
      @php
        $action_map_vision = get_field('action_map_vision');
      @endphp
      <div class="action-map-vision center-align">
        {!! $action_map_vision !!}
      </div>
    </div>
  </div>
</section>
@php
  $action_map_instructions = get_field('action_map_help_us');
@endphp
<section class="action-map-help-us" style="background-image: url('{!! $action_map_instructions['action_map_help_us_image']['sizes']['large'] !!}')">
  <div class="container">
    <div class="row">

      <div class="col m6 action-map-instructions">
          {!! $action_map_instructions['action_map_help_us_text'] !!}
      </div>

    </div>
  </div>
</section>

<section class="container action-map-support">
  <div class="row">
    <div class="col m12 action-map-endorse">
      @php
        $action_map_summary = get_field('action_map_summary');
      @endphp
      <div>
        {!! $action_map_summary !!}
      </div>
    </div>
  </div>
</section>
<section class="action-map-cta">
  <div class="row">
    <div class="col m12 center-align">

      @php
        $action_map_contact = get_field('action_map_contact');
      @endphp
      <div class="action-map-vision center-align">
        {!! $action_map_contact !!}
      </div>
    </div>
  </div>
</section>
