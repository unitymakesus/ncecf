<section class="container" role="region" aria-label="Introduction">
  <div class="row">
    <div class="col l7 m6 s12">
      {{ the_content() }}
      @if (!empty(get_field('more_about_issue')))
        <p><a class="btn" href="#more">Read More About This Issue</a><p>
      @endif
    </div>
    <div class="col l5 m6 s12">
      @php ($visual = get_field('visual'))

      @if ($visual[0][acf_fc_layout] == 'iframe')
        {!! $visual[0][iframe_code] !!}
      @elseif ($visual[0][acf_fc_layout] == 'image')
        <img class="z-depth-1" src="{!! $visual[0]['image']['sizes']['large'] !!}" srcset="{!! $visual[0]['image']['sizes']['medium'] !!} 320w, {!! $visual[0]['image']['sizes']['large'] !!} 992w" />
      @elseif ($visual[0][acf_fc_layout] == 'oembed')
        <div class="embed-container">
        	{!! $visual[0]['oembed_code'] !!}
        </div>
      @endif
    </div>
  </div>
</section>

@php ($numbers = get_field('numbers-data'))
@if (!empty($numbers))
  <section class="container" role="region" aria-label="Quick Facts">
    <div class="row">
      @php
        switch (count($numbers)) {
          case "1":
            $mcol = "m6";
            break;
          case "2":
            $mcol = "m6";
            break;
          case "3":
            $mcol = "m4";
            break;
          case "4":
            $mcol = "m3";
            break;
        }
      @endphp
      @foreach ($numbers as $n)
        <div class="col {{ $mcol }} s6">
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
              @if (!empty($n['source']))
                <div class="source">(Source: {!! $n['source'] !!})</div>
              @endif
            </figcaption>
          </figure>
        </div>
      @endforeach
    </div>
  </section>
@endif

@if (!empty($whattodo = get_field('what_can_we_do')))
  <section class="background-paper" role="region" aria-labelled-by="action-label">
    <div class="container">
      <div class="row">
        <div class="col l8 m10 s12 push-l2 push-m1">
          <h2 id="action-label" class="center-align">What Can We Do About It?</h2>
          {!! apply_filters('the_content', $whattodo) !!}
        </div>
      </div>
    </div>
  </section>
@endif

<section role="region" aria-label="Related Content">
  @if (!empty($resources = get_field('issues_resources')))
    <div class="section padding">
      <h2 class="center-align">Featured Resources</h2>
      <div class="row flex flex-wrap featured-resources">
        @php
          $featured_resources = array_slice($resources, 0, 4);
          $numbers = range(1, 20);
          shuffle($numbers);
          $i = 1;
        @endphp
        @foreach ($featured_resources as $resource)
          @php
            $term_list = wp_get_post_terms($resource->ID, 'resource-type', array('fields' => 'names'));
            // $link = (get_field('uploaded_file', $resource->ID) == 1) ? wp_get_attachment_url(get_field('file', $resource->ID)) : get_field('link', $resource->ID);
            $link = get_permalink($resource->ID);
          @endphp
          <div class="col l3 m6 s12 has-background-image wash"  data-rand="{{ $numbers[$i] }}">
            <a href="{{ $link }}" target="_blank" rel="noopener" class="mega-link" aria-hidden="true"></a>
            <div class="flex">
              @if (!empty($term_list))
                <div class="types">
                  @foreach ($term_list as $term)
                    <div class="chip"><span aria-label="Type"></span>{{ $term }}</div>
                  @endforeach
                </div>
              @endif
              <div class="title-wrap">
                <h3>{{ $resource->post_title }}</h3>
                {!! get_field('description', $resource->ID) !!}
                <p><a href="{{ $link }}" target="_blank" rel="noopener">See This Resource</a></p>
              </div>
            </div>
          </div>
          @php ($i++)
        @endforeach
      </div>
      <div class="row">
        <p class="center-align"><a href="/resources/?_resource_issue={{ get_the_id() }}" class="btn btn-green">See All Related Resources</a></p>
      </div>
    </div>
  @endif

  <div class="container">
    <div class="row">
      @php
        $news_ids = get_field('issues_posts');
        $news_posts = new WP_Query(['post__in' => $news_ids, 'posts_per_page' => 7]);
      @endphp

      @if ($news_posts->have_posts())
        <div class="col m6 s12 news-list">
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
          <p><a href="/news/?_related_issues={{ get_the_id() }}" class="btn btn-slate">All Related Posts</a></p>
          @php (wp_reset_postdata())
        </div>
      @endif

      @php ($issues = get_field('related_issues'))
      @if (!empty($issues))
        <div class="col m6 s12">
          <h2>Connected Issues</h2>
          @foreach ($issues as $issue)
            <div class="issue-banner" style="background-image: url('{!! get_the_post_thumbnail_url($issue->ID, 'medium_large') !!}')">
              <h3 class="center-align"><a href="{{ get_the_permalink($issue->ID) }}"><span>{{ get_the_title($issue->ID) }}</span></a></h1>
            </div>
          @endforeach
        </div>
      @endif
    </div>
  </div>
</section>

@php
  $more = get_field('more_about_issue');
  $n = 1;
@endphp
@if (!empty($more))
<section id="more" role="region" aria-label="More About This Issue">
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
