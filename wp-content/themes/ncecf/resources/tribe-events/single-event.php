<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.3
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural   = tribe_get_event_label_plural();

$event_id = get_the_ID();

?>

<?php while ( have_posts() ) :  the_post(); ?>
	<div class="container">
  <div id="tribe-events-content" class="tribe-events-single row">
    <div class="col m6 s12">
    	<?php the_title( '<h2 class="tribe-events-single-event-title">', '</h2>' ); ?>

    	<div class="tribe-events-schedule tribe-clearfix">
        <div class="event-initiative h3">
      		<?php
      		echo tribe_get_event_categories(
      			get_the_id(), array(
      				'before'       => '',
      				'sep'          => ', ',
      				'after'        => '',
      				'label'        => 'Initiative', // An appropriate plural/singular label will be provided
      				'label_before' => '<span class="label">',
      				'label_after'  => '</span>',
      				'wrap_before'  => '',
      				'wrap_after'   => '',
      			)
      		);
      		?>
        </div>
        <?php echo tribe_events_event_schedule_details( $event_id, '<div class="schedule h3">', '</div>' ); ?>
    	</div>

  		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  			<!-- Event featured image, but exclude link -->
  			<?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>

  			<!-- Event content -->
  			<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
  			<div class="tribe-events-single-event-description tribe-events-content">
    				<?php the_content(); ?>
  			</div>
  			<!-- .tribe-events-single-event-description -->
  			<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>
  		</div> <!-- #post-x -->
    </div>

    <div class="col m6 s12">
      <?php if (!empty($resources = get_field('events_resources'))) { ?>
        <h3>Related Resources</h3>
          <?php
          $featured_resources = array_slice($resources, 0, 4);
          foreach ($featured_resources as $resource) {
            $link = (get_field('uploaded_file', $resource->ID) == 1) ? wp_get_attachment_url(get_field('file', $resource->ID)) : get_field('link', $resource->ID);
            ?>
            <div class="report-banner">
              <h3 class="center-align"><a href="<?php echo $link; ?>"><span><?php echo get_the_title($resource->ID); ?></span></a></h1>
            </div>
          <?php } ?>
      <?php } ?>
    </div>
  </div>

  <div class="row">

		<!-- Event meta -->
		<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
		<?php tribe_get_template_part( 'modules/meta' ); ?>
		<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>

		<?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>

  </div><!-- #tribe-events-content -->
</div>
<?php endwhile; ?>
