{{--
  Template Name: Child Page
  Template Post Type: ncecf-issue, issue
--}}

@extends('layouts.app')

@section('sidebar-header')
  @include('partials.page-header')
@endsection

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.content-single-'.get_post_type().'-child')
  @endwhile
@endsection
