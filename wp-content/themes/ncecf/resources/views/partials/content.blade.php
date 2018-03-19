<article @php(post_class())>
  <header>
    @include('partials/entry-meta-date')
    <h2 class="entry-title"><a href="{{ the_permalink() }}">{{ the_title() }}</a></h2>
  </header>
  <div class="entry-content">{!! the_advanced_excerpt('length=40&add_link=0') !!}</div>
</article>
