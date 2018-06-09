<section class="container" role="region" aria-label="Introduction">
  <div class="row">
    <div class="col l7 m6 s12">
      {{ the_content() }}
    </div>
    <div class="col l5 m6 s12">
      <h2>Impact</h2>
      {!! get_field('impact') !!}
    </div>
  </div>
</section>

<section class="background-paper main-points" role="region" aria-label="Main Points">
  <div class="container">
    <div class="row flex">
      @if (!empty($logo = get_field('logo')))
        <div class="col m3 s12">
          <img class="initiative-logo" src="{{ $logo['sizes']['medium_large'] }}" alt="Logo for {{ the_title() }}" />
        </div>
      @endif
      @if (!empty($boxes = get_field('boxes')))
        @foreach ($boxes as $box)
          <div class="col m3 s12">
            <h2>{{ $box['name'] }}</h2>
            {!! $box['text'] !!}
          </div>
        @endforeach
      @endif
    </div>
    <div class="row">
      <?php if( get_field('how_to_join') ): ?>
        <p class="center-align"><a class="btn" href="/join-us/">Learn How To Join Us</a><p>
	    <?php endif; ?>
    </div>
  </div>
</section>

<section class="container" role="region" aria-labelled-by="Advancing Work">
  <div class="row">
    <div class="col l7 m6 s12">
      <h2>Advancing Work</h2>
      <div class="advancing-work">
        @if (!empty($advancing_work = get_field('advancing_work')))
          @foreach ($advancing_work as $work)
            <div class="row flex">
              @if (empty($work['date']))
                <div class="col s12">
                  <div>
                    {!! $work['summary'] !!}
                  </div>
                </div>
              @else
                  <div class="col m3 s4 date flex flex-center">
                    <div class="circle"></div>
                    <div class="date-number">
                      {{ $work['date'] }}
                    </div>
                  </div>
                  <div class="col m9 s8 flex flex-center">
                    <div>
                      {!! $work['summary'] !!}
                    </div>
                  </div>
              @endif
            </div>
          @endforeach
        @endif
      </div>
    </div>
    <div class="col l5 m6 s12">
      {!! get_field('partners') !!}
    </div>
  </div>
</section>

<section role="region" aria-label="Related Content">
  @if (!empty($resources = get_field('initiatives_resources')))
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
          $link = (get_field('uploaded_file', $resource->ID) == 1) ? wp_get_attachment_url(get_field('file', $resource->ID)) : get_field('link', $resource->ID);
        @endphp
        <div class="col l3 m6 s12 has-background-image wash" data-rand="{{ $numbers[$i] }}">
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
      <p class="center-align"><a href="/resources/?_resource_initiative={{ get_the_id() }}" class="btn btn-green">See All Related Resources</a></p>
    </div>
  @endif

  <div class="container">
    <div class="row">
      <div class="col m6 s12 news-list">
        @php
          $news_ids = get_field('initiatives_posts');
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
          <p><a href="/news/?_related_initiatives={{ get_the_id() }}" class="btn btn-slate">All Related Posts</a></p>
        @endif
        @php (wp_reset_postdata())
      </div>

      <div class="col m6 s12">
        <h2>Connected Initiatives</h2>
        @php ($issues = get_field('related_initiatives'))

        @foreach ($issues as $issue)
          <div class="issue-banner" style="background-image: url('{!! get_the_post_thumbnail_url($issue->ID, 'medium_large') !!}')">
            <h3 class="center-align"><a href="{{ get_the_permalink($issue->ID) }}"><span>{{ get_the_title($issue->ID) }}</span></a></h1>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
