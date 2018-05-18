<?php
/**
 * Filter View Template
 * This contains the hooks to generate a filter sidebar.
 *
 * Override this template in your own theme by creating a file at:
 *
 *     [your-theme]/tribe-events/filter-bar/filter-view-horizontal.php
 *
 * @package TribeEventsCalendar
 * @since  1.0
 * @author Modern Tribe Inc.
 * @version 4.5
 *
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }

do_action( 'tribe_events_filter_view_before_template' );
?>
<section class="background-paper" role="region" aria-label="Search Resources">
  <div class="container">
    <div id="tribe_events_filters_wrapper" class="tribe-events-filters-horizontal tribe-clearfix">
    	<?php do_action( 'tribe_events_filter_view_before_filters' ); ?>
    	<div class="tribe-events-filters-content tribe-clearfix">
    		<h2 class="tribe-events-filters-label"><?php esc_html_e(  'Filter Results', 'tribe-events-filter-view' ); ?></h2>
    		<!-- <div id="tribe_events_filter_control" class="tribe-clearfix"> -->
    			<!-- <a id="tribe_events_filters_toggle" class="tribe_events_filters_close_filters" href="#" data-state="<?php esc_attr_e( 'Show Advanced Filters', 'tribe-events-filter-view' ); ?>"><?php esc_html_e( 'Collapse Filters', 'tribe-events-filter-view' ); ?></a> -->
    			<!-- <a id="tribe_events_filters_toggle" class="tribe_events_filters_show_filters" href="#" ><?php esc_html_e( 'Show Filters', 'tribe-events-filter-view' ); ?></a> -->
    			<!-- <a id="tribe_events_filters_reset" href="#"><span class="dashicons dashicons-image-rotate tribe-reset-icon"></span><?php esc_html_e( 'Reset Filters', 'tribe-events-filter-view' ); ?></a> -->
    		<!-- </div> -->
    		<form id="tribe_events_filters_form" method="post" action="">

    			<?php do_action( 'tribe_events_filter_view_do_display_filters' ); ?>

    			<input type="submit" value="<?php esc_attr_e( 'Submit', 'tribe-events-filter-view' ) ?>" />

    		</form>

        <div class="right">
          <p class="h3">Questions about a meeting or training?</p>
          <a href="/contact/" class="btn">Contact Us</a>
        </div>

    		<div id="tribe_events_filter_control" class="tribe-events-filters-mobile-controls tribe-clearfix">
    			<!-- <a id="tribe_events_filters_toggle" class="tribe_events_filters_close_filters" href="#" data-state="<?php esc_attr_e( 'Show Advanced Filters', 'tribe-events-filter-view' ); ?>"><?php esc_html_e( 'Collapse Filters', 'tribe-events-filter-view' ); ?></a> -->
    			<!-- <a id="tribe_events_filters_toggle" class="tribe_events_filters_show_filters" href="#" ><?php esc_html_e( 'Show Filters', 'tribe-events-filter-view' ); ?></a> -->
    			<a id="tribe_events_filters_reset" href="#"><span class="dashicons dashicons-image-rotate tribe-reset-icon"></span><?php esc_html_e( 'Reset Filters', 'tribe-events-filter-view' ); ?></a>
    		</div>
    	</div>

    	<?php do_action( 'tribe_events_filter_view_after_filters' ); ?>

    </div>
  </div>
</section>

<?php
do_action( 'tribe_events_filter_view_after_template' );
