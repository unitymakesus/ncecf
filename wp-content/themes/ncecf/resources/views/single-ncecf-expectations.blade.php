@extends('layouts.app')

@section('sidebar-header')
  @include('partials.actionmap-page-header')
@endsection

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.content-single-'.get_post_type())
    @include('partials.actionmap-page-footer')

  @endwhile
@endsection
