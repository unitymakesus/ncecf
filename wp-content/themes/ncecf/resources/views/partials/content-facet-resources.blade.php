@php
	$resources = new WP_Query([
		'post_type' => 'ncecf-resource',
		'posts_per_page' => 20,
		'orderby' => 'date',
		'order' => 'DESC',
	]);
@endphp

{!! facetwp_display( 'facet', 'search' ) !!}
{!! facetwp_display( 'facet', 'resource_type' ) !!}
{!! facetwp_display( 'facet', 'resource_issue' ) !!}
{!! facetwp_display( 'facet', 'resource_initiative' ) !!}
{!! facetwp_display( 'facet', 'resource_year' ) !!}

<div class="facetwp-template">
@if( $resources->have_posts() )
  @while( $resources->have_posts() )
    @php( $resources->the_post())
    <h2><a href="#">{{ the_title() }}</a></h2>
  @endwhile
@else
  <p><?php _e( 'Sorry, no resources matched your criteria.' ); ?></p>
@endif
</div>
