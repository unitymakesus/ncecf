@php
  $more = get_field('more_about_issue');
  $n = 1;
@endphp
@if (!empty($more))
<section role="region" aria-label="More About This Issue">
  <h2 class="center-align">More About {{ the_title() }}</h2>
  <div class="expandable">
    @foreach ($more as $m)
      <div class="group closed" id="more{{ $n }}">
        <div class="expandable-header">
          <div class="container">
            <div class="row">
              <div class="col l8 m10 s12 push-l2 push-m1">
                <h3>{{ $m['title'] }}</h3>
              </div>
            </div>
          </div>
        </div>
        <div class="expandable-body">
          <div class="container">
            <div class="row">
              <div class="col m1">
                <p><button class="btn-flat copy-link" data-clipboard-text="{{ the_permalink() }}#more{{ $n }}">Copy Link</button></p>
              </div>
              <div class="col l8 m10 s12 push-l1">
                {!! apply_filters('the_content', $m['content']) !!}
              </div>
            </div>
          </div>
        </div>
      </div class="group">
      @php ($n++)
    @endforeach
  </div>
</section>
@endif
