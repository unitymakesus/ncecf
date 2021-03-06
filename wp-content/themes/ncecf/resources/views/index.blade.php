@extends('layouts.app')

@section('sidebar-header')
  @include('partials.page-header')
@endsection

@section('content')
  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

  @while (have_posts()) @php(the_post())
    @include('partials.content-'.get_post_type())
  @endwhile

  @php
    // the_posts_pagination([
    //   'prev_text' => '&laquo; Previous <span class="screen-reader-text">page</span>',
    //   'next_text' => 'Next <span class="screen-reader-text">page</span> &raquo;',
    //   'before_page_number' => '<span class="meta-nav screen-reader-text">Page</span>',
    // ]);
  @endphp
@endsection
