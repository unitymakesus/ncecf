<?php

namespace App;

/**
 * Issues listed by category shortcode
 */
add_shortcode('list-issues', function() {
	$issue_cats = get_terms([
		'taxonomy' => 'issue-category',
		'hide_empty' => true,
		'orderby' => 'menu_order',
		'order' => 'ASC'
	]);

	ob_start();

	foreach ($issue_cats as $cat) {
		$issues = new \WP_Query([
			'post_type' => 'ncecf-issue',
			'posts_per_page' => -1,
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'tax_query' => [
				[
					'taxonomy' => 'issue-category',
					'field' => 'slug',
					'terms' => $cat->slug
				]
			]
		]);

		if ($issues->have_posts()) :

			echo '<h2 class="issue-category">' . $cat->name . '</h2>';
			echo '<ul>';

			while ($issues->have_posts()) : $issues->the_post();
			?>
				<li>
					<a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a>:
					<?php the_advanced_excerpt('length=20&read_more='); ?>
				</li>
			<?php
			endwhile;

			echo '</ul>';

		endif; wp_reset_postdata();
	}

	return ob_get_clean();
});


/**
 * Initiatives list shortcode
 */
add_shortcode('list-initiatives', function() {
	$initiatives = new \WP_Query([
		'post_type' => 'ncecf-initiative',
		'posts_per_page' => -1,
		'orderby' => 'title',
		'order' => 'ASC',
	]);

	ob_start();

	if ($initiatives->have_posts()) :

		echo '<ul>';

		while ($initiatives->have_posts()) : $initiatives->the_post();
		?>
			<h2><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a></h2>
			<div><?php the_advanced_excerpt('read_more=Learn More'); ?></div>
		<?php
		endwhile;

		echo '</ul>';

	endif; wp_reset_postdata();

	return ob_get_clean();
});


/**
 * Staff list shortcode
 */
add_shortcode('people', function($atts) {
	extract( shortcode_atts([
    'type' => 'staff'
  ], $atts ) );

	$people = new \WP_Query([
		'post_type' => 'ncecf-person',
		'posts_per_page' => -1,
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'meta_query' => array(
			array(
				'key' => 'staff',
				'value' => ($type == 'staff') ? 1 : (($type == 'board') ? 0 : ''),
				'compare' => '=',
			),
		)
	]);

	ob_start();

	if ($people->have_posts()) : while ($people->have_posts()) : $people->the_post();
		?>
		<div class="row person" itemscope itemprop="author" itemtype="http://schema.org/Person">
      <div class="col m4 s6 xs12">
        <?php
          $imgdata = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium-square');
          if ($imgdata[1] < 400) {
            $thumbnail = get_the_post_thumbnail_url('thumbnail');
          } else {
            $thumbnail = $imgdata[0];
          }
        ?>
        <img src="<?php echo $thumbnail; ?>" alt="Photograph of <?php get_the_title(); ?>" itemprop="image" />

        <?php if (!empty($email = get_field('email'))) { ?>
          <div><a itemprop="email" target="_blank" rel="noopener" href="mailto:<?php echo eae_encode_str($email); ?>"><?php echo eae_encode_str($email); ?></a></div>
        <?php } ?>

				<?php
					$linkedin = get_field('linkedin');
					$twitter = get_field('twitter_name');
				?>

        <?php if (!empty($linkedin) || !empty($twitter)) { ?>
          <ul class="social-icons">
            <?php if (!empty($linkedin)) { ?><li class="linkedin"><a href="<?php echo $linkedin; ?>">LinkedIn</a></li><?php } ?>
            <?php if (!empty($twitter)) { ?><li class="twitter"><a href="https://www.twitter.com/<?php echo $twitter; ?>">Twitter</a></li><?php } ?>
          </ul>
        <?php } ?>
      </div>
			<div class="col m8 s6 xs12">
				<h2 itemprop="name"><?php the_title(); ?></h2>

        <?php if (!empty($title = get_field('title'))) { ?>
  				<div class="title" itemprop="jobTitle"><?php echo $title; ?></div>
        <?php } ?>

        <?php
          if (!empty($short_bio = get_field('short_bio'))) {
            echo $short_bio;
            echo '<p><a href="' . get_permalink() . '">Read more about ' . get_the_title() . '</a></p>';
          } else {
            the_content();
          }
        ?>
			</div>
		</div>
		<?php
	endwhile; endif; wp_reset_postdata();

	return ob_get_clean();
});

/**
 * Display posts by tag shortcode.
 */
add_shortcode('display_posts_by_tag', function($atts, $content = null) {
    global $post;

    extract(shortcode_atts([
        'tag'     => '',
        'num'     => '5',
        'order'   => 'DESC',
        'orderby' => 'post_date',
    ], $atts));

    $args = [
        'tag'            => $tag,
        'posts_per_page' => $num,
        'order'          => $order,
        'orderby'        => $orderby,
    ];

    $output = '';

    $posts = get_posts($args);

    foreach ($posts as $post) {
        setup_postdata($post);
        $output .= '<li><a href="'. get_the_permalink() .'">'. get_the_title() .'</a></li>';
    }

    wp_reset_postdata();

    return '<ul>'. $output .'</ul>';
});
