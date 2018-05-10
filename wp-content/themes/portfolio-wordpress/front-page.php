<?php

get_header();
?>
<div class="container-fluid developer-section d-flex justify-content-center align-items-center">
  <div class="hero-heading">
    <h1><u> WordPress</u></h1>
  </div>
</div>

<div class="container featured-blog">
  <div class="jumbotron">
    <h3>Featured Blogs</h3>
  </div>

  <div class="featured-content">


      <?php

      $args = array(
        'tag'  => 'featured-blog',
        'orderby'  => 'post-date',
        'order'  =>  'DESC'
      );

      // The Query
      $the_query = new WP_Query( $args );

      // The Loop
      if ( $the_query->have_posts() ) {

      	while ( $the_query->have_posts() ) {
      		$the_query->the_post(); ?>

            <div class="row excerpt align-middle">
              <div class="col-md-2">
                <a href="<?php echo get_the_permalink(); ?>">
                  <?php the_post_thumbnail( 'thumbnail' ); ?>
                </a>
              </div>
              <div class="col-md-10">


                <a href="<?php echo get_the_permalink(); ?>">
                  <h4><?php the_title(); ?></h4>
                </a>


                <?php the_excerpt(); ?>
              </div>
            </div>

      <?php	}

      	/* Restore original Post Data */
      	wp_reset_postdata();
      } else {
      	echo '<p>No Posts Found</p>';
      }
      ?>

  </div>

  <div class="container featured-blog">
    <div class="jumbotron">
      <h3>Contact Me</h3>
    </div>

  <?php echo do_shortcode('[contact-form-7 id="1770" title="Contact form 1"]');?>

</div>

<?php
get_footer();
