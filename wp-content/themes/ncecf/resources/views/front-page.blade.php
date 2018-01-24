<!-- Themplate for homepage -->
@extends('layouts.app')

@section('content')
  @include('partials.home-content')
  @while(have_posts()) @php(the_post())
    @include('partials.page-header')
    @include('partials.content-page')
  @endwhile
@endsection
