@if (is_home() || is_singular('post') || is_date() || is_category())
  @php
    $id = get_option('page_for_posts')
  @endphp
@elseif (is_singular('ncecf-person'))
  @php
    $id = get_page_by_path('about/staff');
  @endphp
@else
  @php ($id = get_the_id())
@endif

<div class="has-background-image wash page-header" style="background-image: url('{!! get_the_post_thumbnail_url($id, 'large') !!}')">
  <div class="container center-align">
    @if (is_singular('post'))
      <div class="h1">{{ get_the_title($id) }}</div>
    @elseif (is_singular('ncecf-initiative') && !empty($logo = get_field('logo')))
      <h1 class="screen-reader-text">{{ get_the_title($id) }}</h1>
      <img class="initiative-logo" src="{{ $logo['sizes']['medium_large'] }}" alt="Logo for {{ the_title() }}" />
    @else
      <h1>{{ get_the_title($id) }}</h1>
    @endif
  </div>
</div>
