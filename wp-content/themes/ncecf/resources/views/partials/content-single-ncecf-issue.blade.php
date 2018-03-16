<section class="has-background-image wash" role="region" aria-label="Page Header" style="background-image: url('{!! get_the_post_thumbnail_url(get_the_id(), 'large') !!}')">
  <div class="container">
    <h1 class="center-align">{{ the_title() }}</h1>
  </div>
</section>

<section class="container" role="region" aria-label="Introduction">
  <div class="row">
    <div class="col l7 m6 s12">
      {{ the_content() }}
      <p><a class="btn" href="#">Read More About This Issue</a><p>
    </div>
    <div class="col l5 m6 s12">
      @php ($visual = get_field('visual'))

      @if ($visual[0][acf_fc_layout] == 'iframe')
        {!! $visual[0][iframe_code] !!}
      @elseif ($visual[0][acf_fc_layout] == 'image')

      @elseif ($visual[0][acf_fc_layout] == 'oembed')

      @endif
    </div>
  </div>
</section>

<section class="container" role="region" aria-label="Quick Stats">
  <div class="row">
    @php ($numbers = get_field('numbers-data'))
    @foreach ($numbers as $n)
      <div class="col m3 s6">
        <figure class="stat">
          <div class="stat-circle">
            <svg viewbox="0 0 36 36">
              <path class="circle-bg"
                d="M18 2.0845
                  a 15.9155 15.9155 0 0 1 0 31.831
                  a 15.9155 15.9155 0 0 1 0 -31.831"
                stroke-width="1";
              />
              <path class="circle"
                stroke-dasharray="{{ $n['percent'] }}, 100"
                d="M18 2.0845
                  a 15.9155 15.9155 0 0 1 0 31.831
                  a 15.9155 15.9155 0 0 1 0 -31.831"
              />
            </svg>
            <span class="stat-number">{{ $n['number'] }}</span>
          </div>
          <figcaption class="stat-fact center-align">
            {{ $n['text'] }}
          </figcaption>
        </figure>
      </div>
    @endforeach
  </div>
</section>

<section class="background-paper" role="region" aria-labelled-by="action-label">
  <div class="container">
    <div class="row">
      <div class="col l8 m10 s12 push-l2 push-m1">
        <h2 id="action-label" class="center-align">What Can We Do About It?</h2>
        {{ the_field('what_can_we_do') }}
      </div>
    </div>
  </div>
</section>

<section role="region" aria-label="Related Content">
  <h2 class="center-align">Featured Resources</h2>
  <div class="row">
    @php ($resources = get_field('issues_resources'))
    <p class="center-align"><a href="#" class="btn btn-green">See All Related Resources</a></p>
  </div>

  <div class="container">
    <div class="row">
      <div class="col m6 s12 news-list">
        @php
          $news_ids = get_field('issues_posts');
          $news_posts = new WP_Query(['post__in' => $news_ids, 'posts_per_page' => 7]);
        @endphp

        @if ($news_posts->have_posts())
          <h2>Related News Posts</h2>
          @while ($news_posts->have_posts())
            @php ($news_posts->the_post())
            <article @php(post_class())>
              <header>
                @include('partials/entry-meta-date')
                <h3 class="entry-title"><a href="{{ the_permalink() }}">{{ the_title() }}</a></h3>
              </header>
            </article>
          @endwhile
          <p><a href="#" class="btn btn-slate">All Related Posts</a></p>
        @endif
        @php (wp_reset_postdata())
      </div>

      <div class="col m6 s12">
        <h2>Connected Issues</h2>
        @php ($issues = get_field('related_issues'))

        @foreach ($issues as $issue)
          <div class="issue-banner" style="background-image: url('{!! get_the_post_thumbnail_url($issue->ID, 'medium') !!}')">
            <h3 class="center-align"><a href="{{ get_the_permalink($issue->ID) }}"><span>{{ get_the_title($issue->ID) }}</span></a></h1>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

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
