<!-- Issues Page (I need to reroute, I think - with the menu appearance in Admin) -->
<div class="issue-container">
  <secion id="introduction-content">
    <div class="left-introduction">
      <?php the_field('introduction-text'); ?>
    </div>
    <div class="right-introduction">
      <?php the_flexible_field('introduction-visual', $post_id); ?>
    </div>
  </section>
  <section id="percentage-charts">
    <?php if( have_rows('numbers-data-repeater') ): ?>
      <ul class="slides">
        <?php while( have_rows('numbers-data-repeater') ): the_row();
          // vars
          $number = get_sub_field('number-sub');
          $content = get_sub_field('text-sub');
          $link = get_sub_field('percent-of-circle-sub');
        ?>
          <li class="slide">
            <?php if( $number ): ?>
              <?php echo $number; ?>
            <?php endif; ?>
              <?php echo $link; ?>
            <?php if( $link ): ?>
              </a>
            <?php endif; ?>
              <?php echo $content; ?>
          </li>
        <?php endwhile; ?>
    	</ul>
    <?php endif; ?>
  </section>
  <section id="what-can-we-do-about-it">
    <div class="what-can-we-do">
      <?php the_field('what_can_we_do'); ?>
    </div>
  </section>
  <section id="featured-resources">
    <?php
      $posts = get_field('featured_resources');
      if( $posts ): ?>
        <ul>
          <?php foreach( $posts as $post): ?>
            <?php setup_postdata($post); ?>
            <li>
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              <span>Author: <?php the_field('author'); ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>
  </section>
  <section id="related-issues-blogs">
    <div class="left-related">
      <?php
        $posts = get_field('related_blog_posts');
        if( $posts ): ?>
          <ul>
            <?php foreach( $posts as $post): ?>
              <?php setup_postdata($post); ?>
              <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <span>Author: <?php the_field('author'); ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>
    <div class="right-related">
      <?php
        $posts = get_field('related_issues');
        if( $posts ): ?>
          <ul>
            <?php foreach( $posts as $post): ?>
              <?php setup_postdata($post); ?>
              <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <span>Author: <?php the_field('author'); ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>
  </section>
  <section id="issue-elaborations">
  <?php if( have_rows('more_issue_elaboration') ): ?>
  	<ul class="slides">
  	<?php while( have_rows('more_issue_elaboration') ): the_row();
  		// vars
  		$title = get_sub_field('title-sub');
  		$content = get_sub_field('content-sub');
  		$id = get_sub_field('id-sub');
  		?>
  		<li class="slide">
  			<?php if( $id ): ?>
  				<?php echo $id; ?>
  			<?php endif; ?>
  				<?php echo $title; ?>
  			<?php if( $id ): ?>
  				</a>
  			<?php endif; ?>
  		    <?php echo $content; ?>
  		</li>
  	<?php endwhile; ?>
  	</ul>
  <?php endif; ?>
  </section>
</div>
