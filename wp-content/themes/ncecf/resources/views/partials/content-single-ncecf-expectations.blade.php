<div class="has-background-image wash page-header" style="background-image: url('{!! get_the_post_thumbnail_url($id, 'large') !!}')">

    <div class="actionmap-expectations-header">
        @php
          $term_list = wp_get_post_terms($post->ID, 'ncecf-expectations-assignment', array('fields' => 'names'));
        @endphp
        <div class="actionmap-subcat">

        @if (!empty($term_list))
            @foreach ($term_list as $term)
              {{ $term }}
            @endforeach
        @endif
        </div>

      <h1>{{ get_the_title($id) }}</h1>

    </div>
    <div class="orange-circle">

    </div>
</div>

<div class="container">
  <div class="row half-circle-blue">

    <div class="col m8 offset-m2">
      <div class="action-map-vision center-align">

      <?php
        the_content();
      ?>
      </div>

    </div>
  </div>
</div>
    <div class="action-map-breadcrumbs">
      <a href="{{ site_url() }}/pathways-action-map-home/#expectations">Pathways Action Map</a> >
      <?php the_title(); ?>
    </div>
<div>
  <div class="row">
    <div class="col m3 actionmap-sidebar-menu">
      @include('partials.actionmap-sidebar')
    </div>
    <div class="col m7 offset-m1">
      <div class="section-header">
        <h2 class="center-align">Prioritized <strong>Actions</strong></h2>
        <p class="center-align">
          Click on an action below to learn more about it and some key initiatives in North Carolina.
        </p>
      </div>

      @php

        $am_strategy_posts = new WP_Query([
        'post_type' => 'ncecf-strategies',
        'orderby' => 'date',
        'order' => 'ASC',
        'tax_query' => [
          'relation' => 'OR',
          [
            'taxonomy' => 'ncecf-expectations-assignment',
            'field'    => 'name',
            'terms' => $term_list,
          ]
        ],
      ]);

      @endphp
      @if ($am_strategy_posts->have_posts())
          @while ($am_strategy_posts->have_posts())
            @php ($am_strategy_posts->the_post())

              <div class="expectation-strategy">
                <p>
                  <i>{{ the_title() }}</i>
                </p>
              </div>

              <?php
                $post_id = get_the_ID();
              ?>

                      @php

                        $am_action_posts = new WP_Query([
                        'post_type' => 'ncecf-actions',
                        'orderby' => 'date',
                        'order' => 'ASC',
                         'meta_query' => [
                          [
                            'key' => 'strategy_assignment',
                            'value' => $post_id,
                            'compare' => 'LIKE',
                          ]
                        ],
                      ]);

                      global $post

                      @endphp

                      @if ($am_action_posts->have_posts())
                          @while ($am_action_posts->have_posts())
                            @php ($am_action_posts->the_post())

                            @php
                              $termed_list = wp_get_post_terms($post->ID, 'ncecf-action-assignment', array('fields' => 'names'));
                            @endphp

                              <div class="individual-action">

                                @if (!empty($termed_list))
                                  <div class="action-category">
                                    @foreach ($termed_list as $term)
                                      {{ $term }}
                                    @endforeach
                                  </div>
                                @endif

                                <h3>
                                  <a href="{{ the_permalink() }}">
                                    {{ the_title() }}
                                  </a>
                                </h3>



                                <a href="{{ the_permalink() }}" class="intiatives-link">
                                  View Initiatives
                                </a>
                              </div>


                          @endwhile
                          @php (wp_reset_postdata())
                      @endif

          @endwhile
          @php (wp_reset_postdata())
      @endif

    </div>



    </div>

  </div>
</div>
