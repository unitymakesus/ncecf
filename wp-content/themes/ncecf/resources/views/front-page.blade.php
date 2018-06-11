<!-- Themplate for homepage -->
@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    <section class="home-header has-background-image" role="region" aria-label="Overview" style="background-image: url('{!! get_the_post_thumbnail_url(get_the_id(), 'full') !!}')">
      <div class="container">
        <div class="row">
          <div class="col l5 m6 s12">
            {!! the_content() !!}
          </div>
        </div>
      </div>
    </section>

    @php
      $sections = get_field('alternating_sections');
      $i = 1;
    @endphp

    @foreach ($sections as $section)
      @php
        if ($i % 2 == 0) {
          $push = 'push-m6';
          $pull = 'pull-m6';
        } else {
          $push = '';
          $pull = '';
        }
      @endphp
      <section class="alternating n-{{ $i % 2 }}" role="region" aria-labelledby="section-{{ $i }}-title">
        <div class="container">
          <div class="row">
            <div class="col m6 s12 {{ $push }}">
              <a href="{{ $section['link'] }}">
                <img class="z-depth-1" src="{!! $section['image']['sizes']['large'] !!}" srcset="{!! $section['image']['sizes']['medium'] !!} 320w, {!! $section['image']['sizes']['large'] !!} 992w" />
              </a>
            </div>
            <div class="col m6 s12 {{ $pull }}">
              <h2 id="section-{{ $i }}-title"><a href="{{ $section['link'] }}">{{ $section['title'] }}</a></h2>
              {!! $section['excerpt'] !!}
              <p class="right-align"><a href="{{ $section['link'] }}" class="btn">Learn More</a></p>
            </div>
          </div>
        </div>
      </section>
      @php ($i++)
    @endforeach

    @php
      $cta = get_field('cta_section');
    @endphp
    <section class="has-background-image wash" role="region" aria-labelledby="partner-title" style="background-image: url('{!! $cta[0]['background_image']['sizes']['large'] !!}')">
      <div class="container center-align">
        <h2 id="partner-title">{{ $cta[0]['heading'] }}</h2>
        <p><a class="btn" href="{{ $cta[0]['button_link'] }}">{{ $cta[0]['button_text'] }}</a><p>
      </div>
    </section>

    <section role="region" aria-label="Recent Updates" class="container">
      <div class="row">
        @php ($news = new WP_Query(['posts_per_page' => 4]))
        @if ($news->have_posts())
          <div class="col m6 s12 news-list">
            <h2><a href="/news/">Latest News</a></h2>
              @while ($news->have_posts()) @php ($news->the_post())
                <article @php(post_class())>
                  <header>
                    @include('partials/entry-meta-date')
                    <h3 class="entry-title"><a href="{{ the_permalink() }}">{{ the_title() }}</a></h3>
                  </header>
                  <div class="entry-content">{!! the_advanced_excerpt('length=40&add_link=0') !!}</div>
                </article>
              @endwhile
            @php (wp_reset_postdata())
            <a href="/news/" class="btn">More News</a>
          </div>
        @endif

        @php
          $resources = get_field('featured_resources');
          $featured_resources = array_slice($resources, 0, 6);
          $numbers = range(1, 48);
          shuffle($numbers);
          $i = 1;
        @endphp
        @if (!empty($resources))
          <div class="col m6 s12">
            <h2><a href="/resources/">Featured Resources</a></h2>
            @foreach ($featured_resources as $resource)
              <div class="report-banner" data-rand="{{ $numbers[$i] }}">
                <h3 class="center-align"><a href="{{ get_the_permalink($resource->ID) }}" target="_blank" rel="noopener"><span>{{ get_the_title($resource->ID) }}</span></a></h1>
              </div>
              @php ($i++)
            @endforeach
          </div>
        </div>
      @endif
    </section>
  @endwhile
@endsection
