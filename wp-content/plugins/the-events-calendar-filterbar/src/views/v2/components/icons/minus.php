<?php
/**
 * View: Minus Icon
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events-filterbar/v2/components/icons/minus.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://m.tri.be/1aiy
 *
 * @var array $classes Additional classes to add to the svg icon.
 *
 * @version TBD
 *
 */
$svg_classes = [ 'tribe-filter-bar-c-svgicon', 'tribe-filter-bar-c-svgicon--minus' ];

if ( ! empty( $classes ) ) {
	$svg_classes = array_merge( $svg_classes, $classes );
}
?>
<svg <?php tribe_classes( $svg_classes ); ?> viewBox="0 0 12 3" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11 1.88H1" stroke-width="2" stroke-linecap="square"/></svg>
