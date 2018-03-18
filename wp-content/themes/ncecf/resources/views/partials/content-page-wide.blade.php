<section class="container" role="region" aria-label="Introduction">
  @php(the_content())
  {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
</section>
