<?php

/**
 * WPized Light: Index
 *
 * @package WordPress
 * @subpackage WPized_Light
 */
get_header();
?>

	<?php
	if ( is_front_page() && wp_light_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}
	?>

	<section id="content-area" class="container" role="main">

    <?php
      $context = Timber::get_context();
      $args = 'post_type=posts&numberposts=4&orderby=desc';
      $post = new TimberPost();
      $context['post'] = Timber::get_post($args);;
      $templates = array('index.twig');
      if (is_home()){
        array_unshift($templates, 'home.twig');
      }
      Timber::render($templates, $context);
     ?>

	</section>

<?php get_footer(); ?>
