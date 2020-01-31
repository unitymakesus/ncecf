<?php
namespace Tribe\Events\Filterbar\Views\V2;

/**
 * Class managing Filters loading for the Views V2.
 *
 * @package Tribe\Events\Filterbar\Views\V2
 * @since   4.9.0
 */
class Filters {
	/**
	 * Which layout setting the user picker for their filters.
	 *
	 * @since  4.9.0
	 *
	 * @return string Either `vertical` or `horizotal` values are allowed only here.
	 */
	public function get_layout_setting() {
		$default = 'vertical';
		$allowed = [ 'horizontal', $default ];
		$value   = (string) tribe_get_option( 'events_filters_layout', $default );

		return esc_attr( in_array( $value, $allowed ) ? $value : $default );
	}
}
