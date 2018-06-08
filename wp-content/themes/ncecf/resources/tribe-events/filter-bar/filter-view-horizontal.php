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
        <div class="row">
          <div class="col">
        		<h2 class="tribe-events-filters-label no-margin"><?php esc_html_e(  'Filter Results', 'tribe-events-filter-view' ); ?></h2>
          </div>
        </div>
    		<!-- <div id="tribe_events_filter_control" class="tribe-clearfix"> -->
    			<!-- <a id="tribe_events_filters_toggle" class="tribe_events_filters_close_filters" href="#" data-state="<?php esc_attr_e( 'Show Advanced Filters', 'tribe-events-filter-view' ); ?>"><?php esc_html_e( 'Collapse Filters', 'tribe-events-filter-view' ); ?></a> -->
    			<!-- <a id="tribe_events_filters_toggle" class="tribe_events_filters_show_filters" href="#" ><?php esc_html_e( 'Show Filters', 'tribe-events-filter-view' ); ?></a> -->
    			<!-- <a id="tribe_events_filters_reset" href="#"><span class="dashicons dashicons-image-rotate tribe-reset-icon"></span><?php esc_html_e( 'Reset Filters', 'tribe-events-filter-view' ); ?></a> -->
    		<!-- </div> -->

        <div class="row">
          <div class="col m9 s12">
        		<form id="tribe_events_filters_form" method="post" action="">
        			<?php do_action( 'tribe_events_filter_view_do_display_filters' ); ?>
        			<input type="submit" value="<?php esc_attr_e( 'Submit', 'tribe-events-filter-view' ) ?>" />
        		</form>
          </div>

          <div class="col m3 s12 events-cta">
            <p class="h4">Questions about<br />a meeting or training?</p>
            <a href="mailto:ncecf@buildthefoundation.org" class="btn" target="_blank" rel="noopener">Contact Us</a>
          </div>
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
