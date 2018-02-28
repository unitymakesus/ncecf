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
              <p class="right-align"><a href="{{ $section['link'] }}">Learn More</a></p>
            </div>
          </div>
        </div>
      </section>
      @php ($i++)
    @endforeach

    <section class="has-background-image wash" role="region" aria-labelledby="partner-title" style="background-image: url('{!! get_the_post_thumbnail_url(get_the_id(), 'large') !!}')">
      <div class="container center-align">
        <h2 id="partner-title">Partner With Us</h2>
        <p><a class="btn" href="#">Join Us</a><p>
      </div>
    </section>


    <section role="region" aria-label="Recent Updates">
      <div class="container">
        <div class="row">
          <div class="col m6 s12 news-list">
            <h2>Latest News</h2>
            @php ($news = new WP_Query(['posts_per_page' => 4]))

            @if ($news->have_posts())
              @while ($news->have_posts()) @php ($news->the_post())
                <article @php(post_class())>
                  <header>
                    @include('partials/entry-meta-date')
                    <h3 class="entry-title"><a href="{{ the_permalink() }}">{{ the_title() }}</a></h3>
                  </header>
                  <div class="entry-content">{!! the_advanced_excerpt('length=40&add_link=0') !!}</div>
                </article>
              @endwhile
            @endif

            @php (wp_reset_postdata())
          </div>

          <div class="col m6 s12">
            <h2>Latest Reports</h2>
            @php ($resources = new WP_Query(['posts_per_page' => 6, 'post_type' => 'ncecf-resource']))

            @if ($resources->have_posts())
              @while ($resources->have_posts()) @php ($resources->the_post())
                <div class="issue-banner" style="background-image: url('{!! get_the_post_thumbnail_url($resource->ID, 'medium') !!}')">
                  <h3 class="center-align"><a href="{{ get_the_permalink($resource->ID) }}"><span>{{ get_the_title($resource->ID) }}</span></a></h1>
                </div>
              @endwhile
            @endif

            @php (wp_reset_postdata())
          </div>
        </div>
      </div>
    </section>
  @endwhile
@endsection
