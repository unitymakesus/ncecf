
@php ($imgdata = get_the_post_thumbnail_url())
@if (!empty($imgdata))
  @php ($thumbnail = $imgdata)
@else
  @php ($thumbnail = '/assets/images/action-map/action-header.jpg')
@endif
<div class="has-background-image wash page-header" style="background-image: url('{!! get_stylesheet_directory_uri() !!}{{ $thumbnail }}')">

    <div class="actionmap-expectations-header">
      @php
        $term_list = wp_get_post_terms($post->ID, 'ncecf-action-assignment', array('fields' => 'names'));
      @endphp
      <div class="actionmap-subcat">
      @if (!empty($term_list))
          @foreach ($term_list as $term)
          <?php $action_term = $term; ?>
            {{ $term }}
          @endforeach
      @endif
      </div>

      <h1>{{ get_the_title($id) }}</h1>

    </div>
    <div class="green-circle">

    </div>
</div>

<div class="container">
  <div class="row half-circle-blue">
    <?php
      $action_recommendation = get_field('action_recommendation');
      $data_dashboard_connection = get_field('data_dashboard_connection');
    ?>
    <div class="col m8 offset-m2 half-circle-blue">
      <div class="action-map-vision center-align">
          <h2>Pathways <strong>Recommendation</strong></h2>

              <?php if (!empty($action_recommendation))  { ?>
                <?php echo $action_recommendation; ?>
              <?php } ?>
            </div>
    </div>
  </div>
</div>
<div class="action-map-breadcrumbs">

        <?php
        $actionstrat = get_field('strategy_assignment');
        $expectation_id = get_field( 'am_expect', $actionstrat);

        foreach( $expectation_id as $term ):
          $expect_name = $term->name;
         endforeach; ?>



      <a href="{{ site_url() }}/pathways-action-map-home/#expectations">Pathways Action Map</a> >
        @php

          $am_strategy_posts = new WP_Query([
          'post_type' => 'ncecf-expectations',
          'tax_query' => [
            'relation' => 'OR',
            [
              'taxonomy' => 'ncecf-expectations-assignment',
              'field'    => 'name',
              'terms' => $expect_name,
            ]
          ],
        ]);

        @endphp
        @if ($am_strategy_posts->have_posts())
            @while ($am_strategy_posts->have_posts())
              @php ($am_strategy_posts->the_post())

                <a href="{{ the_permalink() }}">
                {{ $expect_name }}:
                <?php echo App\get_menu_label_by_post_id(get_the_ID(), 'Action Map Header'); ?>
                </a>

            @endwhile
            @php (wp_reset_postdata())
        @endif

      {{ $action_term }}: <?php the_title(); ?>

</div>
<div>
  <div class="row">
    <div class="col m3 actionmap-sidebar-menu">
      @include('partials.actionmap-sidebar')
    </div>
    <div class="col m7 offset-m1">
      <h2 class="center-align">Why This <strong>Matters</strong></h2>

            <?php
              the_content();
            ?>
    <div>
        <h2 class="center-align">Featured <strong>Initiatives</strong></h2>
        <p class="center-align">
          Click on an Initiative to learn more about its work in this Action area.
        </p>

      @php
        $am_strategy_posts_featured = new WP_Query([
        'posts_per_page'	=> 6,
        'post_type' => 'ncecf-actionmap',
        'post_status' => 'publish',
        'tax_query' => [
          'relation' => 'OR',
          [
            'taxonomy' => 'ncecf-action-assignment',
            'field'    => 'name',
            'terms' => $term_list,
          ]
        ],
        'meta_query' => [
          'relation' => 'OR',
            [
              'key' => 'am_initiative_featured',
              'value' => 'featured',
              'compare' => 'LIKE',
            ],
        ],
      ]);
      @endphp
      <div class="featured-initiatives">
        @if ($am_strategy_posts_featured->have_posts())
            @while ($am_strategy_posts_featured->have_posts())
              @php ($am_strategy_posts_featured->the_post())

                <div class="feat-initiative">
                  <?php $postdate = get_the_date(); ?>
                @if (strtotime($postdate) > strtotime('-90 days'))
                  <div class="action-map-new"><span>New</span></div>
                @endif

                  <p class="initiative-title align-center">
                    <strong>
                      <a href="{{ the_permalink() }}">
                        {{ the_title() }}
                      </a>
                    </strong>
                  </p>
                  @php
                    $excerpt = get_the_excerpt();
                    $excerpt = substr( $excerpt, 0, 100 );
                    $result = substr( $excerpt, 0, strrpos( $excerpt, ' ' ) );
                  @endphp

                  <p>{{ $result }}</p>

                  <a href="{{ the_permalink() }}" class="action-map-learn-more">Learn More</a>
                </div>


            @endwhile
            @php (wp_reset_postdata())
        @endif
      </div>

    </div>


    <div id="initiatives">
      <h2 class="center-align">View All <strong>Initiatives</strong></h2>
      <p class="center-align">
        Click on an Initiative to learn more about its work in this Action area.
      </p>

      <?php
            $paged1 = isset( $_GET['paged1'] ) ? (int) $_GET['paged1'] : 1;

            $ncecf_custom_query_args = array(
                'paged'          => $paged1,
                'posts_per_page'	=> 3,
                'post_type' => 'ncecf-actionmap',
                'tax_query' => [
                  'relation' => 'OR',
                  [
                    'taxonomy' => 'ncecf-action-assignment',
                    'field'    => 'name',
                    'terms' => $term_list,
                  ]
                ],
                'meta_query' => [
                  'relation' => 'OR',
                    [
                      'key' => 'am_initiative_featured',
                      'value' => 'featured',
                      'compare' => 'NOT LIKE',
                    ],
                ],
            );
            $ncecf_custom_query = new WP_Query( $ncecf_custom_query_args );

            while ( $ncecf_custom_query->have_posts() ) : $ncecf_custom_query->the_post(); ?>

            <div class="single-initiative">
              <p class="initiative-title"><strong><a href="{{ the_permalink() }}">
                {{ the_title() }}
              </a></strong></p>

              <a href="{{ the_permalink() }}" class="action-map-learn-more">Learn More</a>
            </div>

          <?php  endwhile; ?>
          <div class="action-map-initiative-pagination center-align">
            <?php
              $pag_args1 = array(
                  'format'  => '?paged1=%#%#initiatives',
                  'current' => $paged1,
                  'total'   => $ncecf_custom_query->max_num_pages
              );
              echo paginate_links( $pag_args1 );
          ?>
          </div>

    </div>

      <div class="data-dash-connection">
        <p class="center-align">See how this Action connects to measures of success in the Pathways Data Dashboard:</p>

        <div class="dash-connection-buttons">
          <?php if (!empty($data_dashboard_connection))  { ?>
            <?php  foreach($data_dashboard_connection as $term){ ?>
                <a href="<?php echo $term["data_dashboard_link"]; ?>" target="_blank">
                  <?php echo $term["data_dashboard_link_label"]; ?>
                </a>
            <?php }?>
          <?php } ?>

        </div>
      </div>


    </div>



    </div>

</div>
<div class="action-map-cta">
  <div class="row">
    <div class="col l12 center-align">
      <h3>
        We are always gathering more information about innovative work going on across the state.
      </h3>

      <h3>
        Have a recommendation of an Initiative to add? Let us know!
      </h3>

      <a href="#" class="pathways-link">Help Us Add To the Action Map</a>
    </div>
  </div>
</div>
