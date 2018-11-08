<?php

/**
 * Class Tribe__Events__Filterbar__Filters__Date_Custom
 */
if (class_exists('Tribe__Events__Filterbar__Filter')) {
  class Tribe__Events__Filterbar__Filters__Date_Custom extends Tribe__Events__Filterbar__Filter {

  	public $type = 'radio';

  	protected function get_values() {
  		$date_array = array(
        'list' => __( 'Upcoming Events', 'tribe-events-filter-view' ),
  			'past' => __( 'Previous Events', 'tribe-events-filter-view' ),
  		);

  		$date_values = array();
  		foreach ( $date_array as $value => $name ) {
  			$date_values[] = array(
  				'name'  => $name,
  				'value' => $value,
  			);
  		}
  		return $date_values;
  	}

  	/**
  	 * Add modifications to the query
  	 *
  	 * @return void
  	 */
  	protected function setup_query_filters() {
  		// global $wp_query;
  		// // band-aid for month view
  		// if ( $wp_query->is_main_query() && $wp_query->get( 'eventDisplay' ) == 'month' ) {
  		// 	$wp_query->set(
  		// 		'meta_query', array(
  		// 			array(
  		// 				'key'  => '_EventStartDate',
  		// 				'type' => 'DATETIME',
  		// 			),
  		// 		)
  		// 	);
  		// }
  		// parent::setup_query_filters();
  	}

  	protected function setup_join_clause() {
  		// add_filter( 'posts_join', array( 'Tribe__Events__Query', 'posts_join' ), 10, 2 );
      //
  		// // Default behavior is to *not* force local TZ; so let's reset to the default behavior
  		// // to make sure we don't interfere with queries other than the Day-filter one.
  		// add_filter( 'tribe_events_query_force_local_tz', '__return_false' );
  	}

  	protected function setup_where_clause() {
      //
  		// /** @var wpdb $wpdb */
  		// global $wpdb;
  		// $clauses = array();
  		// $values = array_map( 'intval', $this->currentValue );
  		// $values = implode( ',', $values );
      //
  		// $eod_cutoff = tribe_get_option( 'multiDayCutoff', '00:00' );
  		// if ( $eod_cutoff != '00:00' ) {
  		// 	$eod_time_difference = Tribe__Date_Utils::time_between( '1/1/2014 00:00:00', "1/1/2014 {$eod_cutoff}:00" );
  		// 	$start_date = "DATE_SUB({$wpdb->postmeta}.meta_value, INTERVAL {$eod_time_difference} SECOND)";
  		// 	$end_date = "DATE_SUB(tribe_event_end_date.meta_value, INTERVAL {$eod_time_difference} SECOND)";
  		// } else {
  		// 	$start_date = "{$wpdb->postmeta}.meta_value";
  		// 	$end_date = 'tribe_event_end_date.meta_value';
  		// }
      //
  		// $clauses[] = "(DAYOFWEEK($start_date) IN ($values))";
      //
  		// // is it on at least 7 days (first day is 0)
  		// $clauses[] = "(DATEDIFF($end_date, $start_date) >=6)";
      //
  		// // determine if the start of the nearest matching day is between the start and end dates
  		// $distance_to_day = array();
  		// foreach ( $this->currentValue as $day_of_week_index ) {
  		// 	$day_of_week_index = (int) $day_of_week_index;
  		// 	$distance_to_day[] = "MOD( 7 + $day_of_week_index - DAYOFWEEK($start_date), 7 )";
  		// }
  		// if ( count( $distance_to_day ) > 1 ) {
  		// 	$distance_to_next_matching_day = 'LEAST(' . implode( ',', $distance_to_day ) . ')';
  		// } else {
  		// 	$distance_to_next_matching_day = reset( $distance_to_day );
  		// }
  		// $clauses[] = "(DATE(DATE_ADD($start_date, INTERVAL $distance_to_next_matching_day DAY)) < $end_date)";
      //
  		// $this->whereClause = ' AND (' . implode( ' OR ', $clauses ) . ')';
      //
  		// // Forces the query to use _EventStartDate and _EventEndDate as the times to base results
  		// // off of, instead of _EventStartDateUTC, _EventEventDateUTC which can produce weird results.
  		// add_filter( 'tribe_events_query_force_local_tz', '__return_true' );
  	}
  }

  new Tribe__Events__Filterbar__Filters__Date_Custom( __( 'Event Date', 'tribe-events-filter-view' ), 'event_display' );
}


// Edit Tribe Events Search
function remove_dates_from_bar( $filters ) {
  if ( isset( $filters['tribe-bar-date'] ) ) {
        unset( $filters['tribe-bar-date'] );
    }

    return $filters;
}
add_filter( 'tribe-events-bar-filters',  'remove_dates_from_bar', 1000, 1 );

// Changes past event views to reverse chronological order
function tribe_past_reverse_chronological ($post_object) {
	$past_ajax = (defined( 'DOING_AJAX' ) && DOING_AJAX && $_REQUEST['tribe_event_display'] === 'past') ? true : false;
  	if(tribe_is_past() || $past_ajax) {
  		$post_object = array_reverse($post_object);
  	}
  	return $post_object;
}
add_filter('the_posts', 'tribe_past_reverse_chronological', 100);
