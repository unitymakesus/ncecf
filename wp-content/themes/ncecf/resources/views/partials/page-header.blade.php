@if (is_home() || is_singular('post') || is_date() || is_category() || is_search())
  @php
    $id = get_option('page_for_posts')
  @endphp
@elseif (is_singular('ncecf-person'))
  @if (get_field('staff') == 1)
    @php ($id = get_page_by_path('about/staff'))
  @elseif (get_field('staff') == 0)
    @php ($id = get_page_by_path('about/board'))
  @endif
@else
  @php ($id = get_the_id())
@endif

<div class="has-background-image wash page-header" style="background-image: url('{!! get_the_post_thumbnail_url($id, 'large') !!}')">
  <div class="container center-align">
    @if (is_search())
      <h1>Search Results</h1>
    @elseif (is_singular('post'))
      <div class="h1">{{ get_the_title($id) }}</div>
    @else
      <h1>{{ get_the_title($id) }}</h1>
    @endif

    @if (have_rows('page_header_links'))
      <div class="page-header__buttons">
        @while (have_rows('page_header_links')) @php the_row() @endphp
          @if ($link = get_sub_field('link'))
            <a class="btn" href="{{ $link['url'] }}" target="{{ $link['target'] ?? '_self' }}">{{ $link['title'] }}</a>
          @endif
        @endwhile
      </div>
    @endif
  </div>
</div>
