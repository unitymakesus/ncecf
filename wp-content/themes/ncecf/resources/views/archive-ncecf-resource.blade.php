@extends('layouts.app')

@section('content')
  <section class="has-background-image wash" role="region" aria-label="Page Header" style="background-image: url('{!! wp_get_attachment_url( 4668 ) !!}')">
    <div class="container">
      <h1 class="center-align">Resources</h1>
    </div>
  </section>

  <section class="background-paper" role="region" aria-label="Search Resources">
    <div class="container">
      <div class="row resources-search">
        <div class="col m8 s12">
          <h2 class="h3">Search Resources</h2>
          {!! facetwp_display( 'facet', 'search' ) !!}
        </div>
        <div class="col m4 s12 resources-cta">
          <p class="h3">Can't find what you need?</p>
          <a href="/contact/" class="btn">Contact Us</a>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <h2 class="h3">Filter Results</h2>
        </div>
      </div>

      <div class="row resources-filter">
        <div>
          {!! facetwp_display( 'facet', 'resource_type' ) !!}
        </div>
        <div>
          {!! facetwp_display( 'facet', 'resource_issue' ) !!}
        </div>
        <div>
          {!! facetwp_display( 'facet', 'resource_initiative' ) !!}
        </div>
        <div>
          {!! facetwp_display( 'facet', 'resource_year' ) !!}
        </div>
      </div>

      <div class="row">
        <div class="col resources-reset">
          <a href="" onclick="FWP.reset()"><span class="dashicons dashicons-image-rotate tribe-reset-icon"></span> Reset Filters</a>
        </div>
      </div>
    </div>
  </section>

  <section class="facetwp-template container" role="region" aria-label="Resources List">
    <div class="row">
      <div class="col m6 s12">
        {!! do_shortcode('[facetwp per_page="true"]') !!}
        {!! do_shortcode('[facetwp counts="true"]') !!}
      </div>
      <div class="col m6 s12 right-align">
        {!! do_shortcode('[facetwp sort="true"]') !!}
      </div>
    </div>

    @if( have_posts() )
      @while( have_posts() )
      <div class="resources-list">
        @php
          the_post();
          $link = (get_field('uploaded_file') == 1) ? wp_get_attachment_url(get_field('file')) : get_field('link');
          $term_list = wp_get_post_terms(get_the_id(), 'resource-type', array('fields' => 'names'));
          $issue_list = get_field('issues_resources');
          $initiative_list = get_field('initiatives_resources');
        @endphp

          <h3><a href="{{ $link }}" target="_blank" rel="noopener">{{ the_title() }}</a></h3>

          <div class="chip"><i class="material-icons" aria-label="Year">date_range</i>
            <span>{{ get_field('year') }}</span>
          </div>

          @if (!empty($term_list))
            @foreach ($term_list as $term)
              <div class="chip"><i class="material-icons" aria-label="Type">library_books</i>
                <span>{{ $term }}</span>
              </div>
            @endforeach
          @endif

          @if (!empty($initiative_list))
            @foreach ($initiative_list as $initiative)
              <div class="chip"><i class="material-icons" aria-label="Initiative">lightbulb_outline</i>
                <span>{{ $initiative->post_title }}</span>
              </div>
            @endforeach
          @endif

          @if (!empty($issue_list))
            @foreach ($issue_list as $issue)
              <div class="chip"><i class="material-icons" aria-label="Issue">attach_file</i>
                <span>{{ $issue->post_title }}</span>
              </div>
            @endforeach
          @endif
        </div>
        @endwhile
        <div class="center-align">
          {!! do_shortcode('[facetwp pager="true"]') !!}
        </div>

    @else
      <p><?php _e( 'Sorry, no resources matched your criteria.' ); ?></p>
    @endif
  </section>

@endsection
