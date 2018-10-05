<!-- this is news -->
@extends('layouts.app')

@section('sidebar-header')
  @include('partials.page-header')
@endsection

@section('content')
  <div class="facetwp-template">
    @if (!have_posts())
      <div class="alert alert-warning">
        {{ __('Sorry, no results were found.', 'sage') }}
      </div>
      {!! get_search_form(false) !!}
    @endif

    @while (have_posts()) @php(the_post())
      @include('partials.content-'.get_post_type())
    @endwhile

    <nav class="navigation pagination" role="navigation">
  		<h2 class="screen-reader-text">Posts navigation</h2>
      {!! do_shortcode('[facetwp pager="true"]') !!}
    </nav>
  </div>
@endsection
