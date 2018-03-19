<div class="container">
  <div class="row">
    <div class="col l8 m10 s12 push-l2 push-m1">
      @php(the_content())
      {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
    </div>
  </div>
</div>
