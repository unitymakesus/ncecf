

      <div class="action-map-initiative-header center-align">
        <p class="page-category">Initiative</p>
        <h1 class="page-title-acmp"><?php the_title(); ?></h1>
      </div>




<div>
  <div class="row">
    <div class="col m3 actionmap-sidebar-menu">
      @include('partials.actionmap-sidebar')
    </div>
    <div class="col m8">

      @php ($imgdata = get_the_post_thumbnail_url())
        @if (!empty($imgdata))

        <div class="col m8 initiative-content">
          <?php
            the_content();
          ?>
          <?php $am_intiative_url = get_field('am_initiative_url'); ?>
          <?php if (!empty($am_intiative_url))  { ?>
            <a href="<?php echo $am_intiative_url; ?>" target="_blank" class="pathways-link"> Visit The Website </a>
          <?php } ?>
        </div>
        <div class="col m4">
          <img src="{!! $imgdata !!}" />
        </div>
        @else
        <div class="col m12 initiative-content">
          <?php
            the_content();
          ?>
          <?php $am_intiative_url = get_field('am_initiative_url'); ?>
          <?php if (!empty($am_intiative_url))  { ?>
            <a href="<?php echo $am_intiative_url; ?>" target="_blank" class="pathways-link"> Visit The Website </a>
          <?php } ?>
        </div>
        @endif


      <div class="action-map-intiative-facts">
        <h2><center>Fast <strong>Facts</strong></center></h2>
        <table>
          <tr>
            <td>
              Relevant Actions
            </td>
            <td>
              @php
              $term_list = wp_get_post_terms($post->ID, 'ncecf-action-assignment', array('fields' => 'names'));
              @endphp


              @php

                $am_strategy_posts = new WP_Query([
                'post_type' => 'ncecf-actions',
                'tax_query' => [
                  'relation' => 'OR',
                  [
                    'taxonomy' => 'ncecf-action-assignment',
                    'field'    => 'name',
                    'terms' => $term_list,
                  ]
                ],
              ]);

              global $post

              @endphp
              <ul class="relevant-actions">

              @if ($am_strategy_posts->have_posts())
                  @while ($am_strategy_posts->have_posts())
                    @php ($am_strategy_posts->the_post())



                    @php
                      $termed_list = wp_get_post_terms($post->ID, 'ncecf-action-assignment', array('fields' => 'names'));
                    @endphp
                      <li>
                        @if (!empty($termed_list))
                            @foreach ($termed_list as $term)
                              <a href="{{ the_permalink() }}">  {{ $term }}</a>
                            @endforeach
                        @endif
                      </li>



                    @endwhile
                    @php (wp_reset_postdata())
                @endif
              </ul>


            </td>
          </tr>
          <tr>
            <td>
              State or Local?
            </td>
            <td>
              <?php $am_intiative_state_local = get_field('am_initiative_state_or_local'); ?>
              <?php if (!empty($am_intiative_state_local))  { ?>
                <?php echo $am_intiative_state_local; ?>
              <?php } ?>
            </td>
          </tr>
          <?php $am_intiative_counties = get_field('am_initiative_counties'); ?>
          <?php if (!empty($am_intiative_counties))  { ?>
          <tr>
            <td>
              Counties
            </td>
            <td>


                <?php echo $am_intiative_counties; ?>

            </td>
          </tr>
          <?php } ?>
          <?php $am_intiative_lead_agency = get_field('am_initiative_lead_agency'); ?>
          <?php if (!empty($am_intiative_lead_agency))  { ?>
          <tr>
            <td>
              Lead Agency
            </td>
            <td>
                <?php echo $am_intiative_lead_agency; ?>
            </td>
          </tr>
          <?php } ?>
          <?php
          // check if the repeater field has rows of data
          if( have_rows('am_additional_rows') ):

           	// loop through the rows of data
              while ( have_rows('am_additional_rows') ) : the_row(); ?>
              <tr>
                <td>
                  <?php the_sub_field('fact_title');?>
                </td>
                <td>
                  <?php the_sub_field('fact_info');?>
                </td>
              </tr>

              <?php  endwhile;

          else :          endif;

          ?>

          <?php
            $am_intiative_contact_name = get_field('am_initiative_contact_name');
            $am_intiative_contact_email = get_field('am_initiative_contact_email');
          ?>
          <?php if (!empty($am_intiative_contact_name))  { ?>
          <tr>
            <td>
              Contact
            </td>
            <td>
                <a href="mailto:<?php echo $am_intiative_contact_name; ?>"  target="_blank"><?php echo $am_intiative_contact_name; ?></a>
            </td>
          </tr>
        <?php } ?>
        </table>
      </div>

      <?php $am_intiative_active_counties = get_field('am_initiative_active_counties');
      if (!empty($am_intiative_active_counties))  { ?>
      <div class="nc-map">
        <h2><center>Active <strong>Counties</strong></center></h2>
        <ul class="active-counties">
          <?php
           if (!empty($am_intiative_active_counties)){
             foreach ($am_intiative_active_counties as $active_county){
               echo "<li>" . $active_county . "</li>";
          } ?>
        </ul>
        <div class="action-map-maps">
          <?php
            if ($active_county == "All State"){ ?>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/nc-maps/all-nc-counties.png" />
            <?php }else{
          ?>
          <?php foreach ($am_intiative_active_counties as $active_county){ ?>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/nc-maps/<?php echo $active_county; ?>.png" />
          <?php } ?>
        </div>

      <?php  }
    } ?>
      </div>
    <?php } ?>

          <!-- <div class="action-map-breadcrumbs ">

            <?php
            $actionstrat = get_field('strategy_assignment');
            $expectation_id = get_field( 'am_expect', $actionstrat);

            foreach( $expectation_id as $term ):
              $expect_name = $term->name;
             endforeach; ?>



          <a href="{{ site_url() }}">Home</a> >
          <a href="{{ site_url() }}/pathways-action-map-home/">Pathways Action Map</a> >
          <?php the_title(); ?>

          </div> -->




    </div> <!-- END M9-->
  </div>



</div>
