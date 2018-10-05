{{--
  Template Name: Events Template
  This file is the basic wrapper template for all the views if 'Events Template'
  is selected in Events -> Settings -> Template -> Events Template.

  @package TribeEventsCalendar
--}}

@extends('layouts.app')

@section('content')
	@php
    $id = get_option('page_for_posts')
  @endphp
	<div class="has-background-image wash page-header" style="background-image: url('{!! wp_get_attachment_url( 6667 ) !!}')">
	  <div class="container center-align">
      <h2 class="h1">Events</h2>
	  </div>
	</div>

	<div id="tribe-events-pg-template" class="tribe-event-pg-template">
		{{ tribe_events_before_html() }}
		{{ tribe_get_view() }}
		{{ tribe_events_after_html() }}
	</div> <!-- #tribe-events-pg-template -->
@endsection
