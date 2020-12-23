
<?php


global $post;

// retrieve our search query if applicable
$query = isset( $_REQUEST['swpquery'] ) ? sanitize_text_field( $_REQUEST['swpquery'] ) : '';

// retrieve our pagination if applicable
$swppg = isset( $_REQUEST['swppg'] ) ? absint( $_REQUEST['swppg'] ) : 1;

if ( class_exists( 'SWP_Query' ) ) {

  $engine = 'action_map_search'; // taken from the SearchWP settings screen

  $swp_query = new SWP_Query(
    // see all args at https://searchwp.com/docs/swp_query/
    array(
      's'      => $query,
      'engine' => $engine,
      'page'   => $swppg,
    )
  );

  // set up pagination
  $pagination = paginate_links( array(
    'format'  => '?swppg=%#%',
    'current' => $swppg,
    'total'   => $swp_query->max_num_pages,
  ) );
}

?>

      <div class="action-map-initiative-header center-align">
        <p class="page-category">Search results for:</p>
        <h1 class="page-title-acmp">
          <?php if ( ! empty( $query ) ) : ?>
            <?php printf( __( ' %s' ), $query ); ?>
          <?php else : ?>
            Pathways Action Map Search Results
          <?php endif; ?>
        </h1>
      </div>
<div class="row">
  <div class="col m3 actionmap-sidebar-menu">
    @include('partials.actionmap-sidebar')
  </div>
  <div class="col col m7 offset-m1 action-map-search-results">

                  <?php if ( ! empty( $query ) && isset( $swp_query ) && ! empty( $swp_query->posts ) ) {
                    foreach ( $swp_query->posts as $post ) {
                      setup_postdata( $post );

                      //var_dump($post);
                      ?>
                        <div class="search-result">

                          <?php
                            $acmp_type = $post->post_type;

                            if ($acmp_type == "ncecf-actionmap"){
                              $acmp_type_title = "Initiative";
                            }
                            if ($acmp_type == "ncecf-expectations"){
                              $acmp_type_title = "Expectation";
                            }
                            if ($acmp_type == "ncecf-actions"){
                              $acmp_type_title = "Action";
                            }
                            if ($acmp_type == "ncecf-strategies"){
                              $acmp_type_title = "Strategy";
                            }
                          ?>
                          <span class="acmp-cat <?php echo $acmp_type; ?>"><?php echo $acmp_type_title; ?></span>
                          <h3>
                            <a href="<?php echo get_permalink(); ?>">
                              <?php the_title(); ?>
                            </a>
                          </h2>

                          <?php
                            $excerpt = get_the_excerpt();
                            $excerpt = substr( $excerpt, 0, 100 );
                            $result = substr( $excerpt, 0, strrpos( $excerpt, ' ' ) );
                          ?>

                          <p><?php echo $result ?></p>
                          <a href="<?php the_permalink() ?>" class="acmp-learn-more">Learn More</a>
                        </div>
                      <?php
                    }

                    wp_reset_postdata();

                    // pagination
                    if ( $swp_query->max_num_pages > 1 ) { ?>
                      <div class="navigation pagination" role="navigation">
                        <h2 class="screen-reader-text">Posts navigation</h2>
                        <div class="nav-links">
                          <?php echo wp_kses_post( $pagination ); ?>
                        </div>
                      </div>
                    <?php }
                  } else {
                    ?><p>No results found.</p><?php
                  } ?>
                </div>
</div>
