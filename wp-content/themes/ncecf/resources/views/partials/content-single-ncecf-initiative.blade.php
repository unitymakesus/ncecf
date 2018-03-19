<section class="has-background-image wash page-header" role="region" aria-label="Page Header" style="background-image: url('{!! get_the_post_thumbnail_url(get_the_id(), 'large') !!}')">
  <div class="container">
    <h1 class="center-align">{{ the_title() }}</h1>
  </div>
</section>

<section class="container" role="region" aria-label="Introduction">
  <div class="row">
    <div class="col l7 m6 s12">
      {{ the_content() }}
    </div>
    <div class="col l5 m6 s12">
      @if (!empty($logo = get_field('logo')))
        <img src="{{ $logo['sizes']['medium_large'] }}" alt="Logo for {{ the_title() }}" />
      @endif
    </div>
  </div>
</section>

<section class="container" role="region" aria-label="Main Points">
  <div class="row">
    @if (!empty($boxes = get_field('boxes')))
      @foreach ($boxes as $box)
        <div class="col m4 s12">
          <h2>{{ $box['name'] }}</h2>
          {!! $box['text'] !!}
        </div>
      @endforeach
    @endif
  </div>
</section>

<section class="background-paper" role="region" aria-labelled-by="Impact">
  <div class="container">
    <div class="row">
      <div class="col m6 s12">
        <h2>Impact</h2>
        {!! get_field('impact') !!}
      </div>
      <div class="col m6 s12">
        {!! get_field('partners') !!}
      </div>
    </div>
    <div class="row">
      <p class="center-align"><a class="btn" href="#">Learn How To Join Us</a><p>
    </div>
  </div>
</section>

<section class="container" role="region" aria-label="Timeline">
  <div class="row">
    <div class="col l8 m10 s12 push-l2 push-m1">
      <h2 class="center-align">Advancing Work</h2>
      @if (!empty($advancing_work = get_field('advancing_work')))
        @foreach ($advancing_work as $work)
          <div class="row">
            <div class="col m3 s4">
              {{ $work['date'] }}
            </div>
            <div class="col m9 s8">
              {{ $work['summary'] }}
            </div>
          </div>
        @endforeach
      @endif
    </div>
  </div>
</section>

<section role="region" aria-label="Related Content">
  @if (!empty($resources = get_field('initiatives_resources')))
    <h2 class="center-align">Featured Resources</h2>
    <div class="row flex flex-wrap featured-resources">
      @php ($featured_resources = array_slice($resources, 0, 4))
      @foreach ($featured_resources as $resource)
        @php
          $term_list = wp_get_post_terms($resource->ID, 'resource-type', array('fields' => 'names'));
          $link = (get_field('uploaded_file', $resource->ID) == 1) ? wp_get_attachment_url(get_field('file', $resource->ID)) : get_field('link', $resource->ID);
        @endphp
        <div class="col l3 m6 s12 has-background-image wash" style="background-image: url('{!! get_the_post_thumbnail_url($resource->ID, 'medium_large') !!}')">
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
      @endforeach
    </div>
    <div class="row">
      <p class="center-align"><a href="#" class="btn btn-green">See All Related Resources</a></p>
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
          <p><a href="#" class="btn btn-slate">All Related Posts</a></p>
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
