<?php

/**
 * Class Tribe__Events__Filterbar__Filters__Time_Of_Day
 */
class Tribe__Events__Filterbar__Filters__Time_Of_Day extends Tribe__Events__Filterbar__Filter {
	public $type = 'checkbox';

	protected function get_values() {
		// The time-of-day filter.
		$time_of_day_array = array(
			'allday' => __( 'All Day', 'tribe-events-filter-view' ),
			'06-12' => __( 'Morning', 'tribe-events-filter-view' ),
			'12-17' => __( 'Afternoon', 'tribe-events-filter-view' ),
			'17-21' => __( 'Evening', 'tribe-events-filter-view' ),
			'21-06' => __( 'Night', 'tribe-events-filter-view' ),
		);

		$time_of_day_values = array();
		foreach ( $time_of_day_array as $value => $name ) {
			$time_of_day_values[] = array(
				'name' => $name,
				'value' => $value,
			);
		}
		return $time_of_day_values;
	}

	protected function setup_join_clause() {
		add_filter( 'posts_join', array( 'Tribe__Events__Query', 'posts_join' ), 10, 2 );
		global $wpdb;
		$values = $this->currentValue;

		$all_day_index = array_search( 'allday', $values );
		if ( $all_day_index !== false ) {
			unset( $values[ $all_day_index ] );
		}

		$joinType = empty( $all_day_index ) ? 'LEFT' : 'INNER';

		$this->joinClause .= " {$joinType} JOIN {$wpdb->postmeta} AS all_day ON ({$wpdb->posts}.ID = all_day.post_id AND all_day.meta_key = '_EventAllDay')";

		if ( ! empty( $values ) ) { // values other than allday
			$this->joinClause .= " INNER JOIN {$wpdb->postmeta} AS tod_start_date ON ({$wpdb->posts}.ID = tod_start_date.post_id AND tod_start_date.meta_key = '_EventStartDate')";
			$this->joinClause .= " INNER JOIN {$wpdb->postmeta} AS tod_duration ON ({$wpdb->posts}.ID = tod_duration.post_id AND tod_duration.meta_key = '_EventDuration')";
		}
	}

	protected function setup_where_clause() {
		global $wpdb;
		$clauses = [];

		if ( in_array( 'allday', $this->currentValue ) ) {
			$clauses[] = "(all_day.meta_value = 'yes')";
		} else {
			$this->whereClause = " AND ( all_day.meta_id IS NULL OR all_day.meta_value != 'yes' ) ";
		}

		foreach ( $this->currentValue as $time_range_string ) {
			if ( $time_range_string == 'allday' ) {
				continue; // handled earlier
			}

			$time_range_frags = explode( '-', $time_range_string );
			$range_start_hour = $time_range_frags[0];
			$range_end_hour   = $time_range_frags[1];
			$range_start_time = $time_range_frags[0] . ':00:00';
			$range_end_time   = $time_range_frags[1] . ':00:00';

			$is_overnight_range = $range_start_hour > $range_end_hour;
			if ( $is_overnight_range ) {
				$clauses[] = $wpdb->prepare( '
				(
					   ( TIME(CAST(tod_start_date.meta_value as DATETIME)) < %s )
					OR ( TIME(CAST(tod_start_date.meta_value as DATETIME)) >= %s )
					OR ( MOD(TIME_TO_SEC(TIMEDIFF(%s, TIME(CAST(tod_start_date.meta_value as DATETIME)))) + 86400, 86400) < tod_duration.meta_value )
				)', $range_end_time, $range_start_time, $range_end_time );
			} else {
				$clauses[] = $wpdb->prepare( '
				(
					   ( TIME(CAST(tod_start_date.meta_value as DATETIME)) >= %s AND TIME(CAST(tod_start_date.meta_value as DATETIME)) < %s )
					OR ( MOD(TIME_TO_SEC(TIMEDIFF(%s, TIME(CAST(tod_start_date.meta_value as DATETIME)))) + 86400, 86400) < tod_duration.meta_value )
				)', $range_start_time, $range_end_time, $range_start_time );
			}
		}
		$this->whereClause .= ' AND (' . implode( ' OR ', $clauses ) . ')';
	}
}
