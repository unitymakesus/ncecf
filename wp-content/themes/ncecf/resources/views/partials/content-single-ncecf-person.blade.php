<div class="container">
  <div class="row person" itemscope itemprop="author" itemtype="http://schema.org/Person">
    <div class="col m4 s6 xs12">
      @php ($imgdata = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium-square'))
      @if ($imgdata[1] < 400)
        @php ($thumbnail = get_the_post_thumbnail_url('thumbnail'))
      @else
        @php ($thumbnail = $imgdata[0])
      @endif

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
        the_content();
      ?>
    </div>
  </div>
</div>
