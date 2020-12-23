{{--
  Template Name: Action Map Search Page
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.actionmap-page-header')
    @include('partials.content-page-'.$post->post_name)
    @include('partials.actionmap-page-footer')

  @endwhile
@endsection
