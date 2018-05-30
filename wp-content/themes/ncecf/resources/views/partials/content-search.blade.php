<article @php(post_class())>
  <header class="search-container">
    @php
      $post_type = get_post_type();
      switch ($post_type) {
        case 'post':
          $label = 'Post';
          $icon = 'notes';
          break;
        case 'page':
          $label = 'Page';
          $icon = 'description';
          break;
        case 'tribe_events':
          $label = 'Event';
          $icon = 'calendar_today';
          break;
        case 'ncecf-issue':
          $label = 'Issue';
          $icon = 'attach_file';
          break;
        case 'ncecf-initiative':
          $label = 'Initiative';
          $icon = 'attach_file';
          break;
        case 'ncecf-resource':
          $label = 'Resource';
          $icon = 'library_books';
          break;
        case 'ncecf-person':
          $label = 'Person';
          $icon = 'person';
          break;
      }
    @endphp
    <div class="chip {{ $label }}">
      <i class="material-icons" aria-lael="Post Type">{{ $icon }}</i>
      <span>{{ $label }}</span>
    </div>
    <h2 class="entry-title"><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h2>
    @if (get_post_type() === 'post')
      @include('partials/entry-meta')
    @endif
  </header>
  <div class="entry-summary">
    @php(the_excerpt())
  </div>
</article>
