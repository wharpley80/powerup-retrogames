<?php
/*
  Template Name: NES-Shop Template
*/
?>

<?php get_header( 'shop' ); ?>

<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<h1 class="shop-title">Nintendo Shop</h1>

<div class="game-shop-cont" id="my-anchor">

  <?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
	
	<div class="shop-wrapper">
	
	  <?php
		  /**
		   * woocommerce_sidebar hook.
		   *
		   * @hooked woocommerce_get_sidebar - 10
		   */
		  do_action( 'woocommerce_sidebar' );
	  ?>
	
		<div class="small-12 large-9 columns" id="product-side">

			<?php
				/**
				 * woocommerce_archive_description hook.
				 *
				 * @hooked woocommerce_taxonomy_archive_description - 10
				 * @hooked woocommerce_product_archive_description - 10
				 */
				do_action( 'woocommerce_archive_description' );
			?>

			<?php if ( have_posts() ) : ?>

				<?php
					/**
					 * woocommerce_before_shop_loop hook.
					 *
					 * @hooked woocommerce_result_count - 20
					 * @hooked woocommerce_catalog_ordering - 30
					 */
					do_action( 'woocommerce_before_shop_loop' );
				?>

				<?php woocommerce_product_loop_start(); ?>

					<?php woocommerce_product_subcategories(); ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php wc_get_template_part( 'content', 'product' ); ?>


					<?php endwhile; // end of the loop. ?>

				<?php woocommerce_product_loop_end(); ?>

				<?php
					/**
					 * woocommerce_after_shop_loop hook.
					 *
					 * @hooked woocommerce_pagination - 10
					 */
					do_action( 'woocommerce_after_shop_loop' );
				?>

			<?php else : ?>
			
			  <?php nes_loop(); ?>

				<?php wc_get_template( 'loop/no-products-found.php' ); ?>

			<?php endif; ?>

		</div>
	</div>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	</div>
</div>

<div class="slide-cont">
	<div class="game-shop-top-wrapper">
		<div class="small-12 medium-8 columns text-center">

		<?php

      $args = array(
        'post_type' => 'product',
        'product_cat' => 'nes-bundle'
      );

      $the_query = new WP_Query($args);

    ?>

      <div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
        <ul class="orbit-container" id="nes-orbit-cont">
          <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
          <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
          
          <?php if (  have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

          <?php
            $thumbnail_id = get_post_thumbnail_id();
            $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true);
            $thumbnail_meta = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
          ?>

          <li class="is-active orbit-slide">
            <a href="<?php the_permalink(); ?>">
              <img class="orbit-image" src="<?php echo $thumbnail_url[0]; ?>" alt="<?php echo $thumbnail_meta; ?>">
            </a>
            <figcaption class="orbit-caption" id="nes-caption"><?php the_title(); ?></figcaption>
          </li>

          <?php endwhile; endif; ?>

        </ul>

        <?php rewind_posts(); ?>
        
        <nav class="orbit-bullets" id="nes-bullets">

          <?php if (  have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

            <button class="<?php if ($the_query->current_post == 0) : ?>is-active<?php endif; ?>" data-slide="<?php echo $the_query->current_post; ?>"><span class="show-for-sr">First slide details.</span><span class="show-for-sr">Current Slide</span>
            </button>

          <?php endwhile; endif; ?>

        </nav>
        
      </div>
    </div>

		<div class="small-12 medium-4 columns" id="mario-side">
		</div>
	</div>
</div>

	<div class="nes-content-cont">
		<div class="small-12 large-5 columns" id="game-cont-left">
			<h2>Nintendo</h2>
			<hr>
			<p>
			   The Nintendo Entertainment System (NES) was an 8-bit gaming console that changed gaming forever. Considered by many to be the best console of all time, and whether or not you agree what's not debatable is the depth of it's library of games. Super Mario Bros., Contra, Zelda, Metroid, Mega Man, and so many more. These games hold up which is why this console is so great. If you don't own one then buy one today, and if you do own one then check out our library of games!
			</p>
		</div>
		<div class="small-12 large-7 columns" id="game-cont-right">
			<a href="https://www.youtube.com/channel/UCyxa1OESMqK7V68zRscpHdA"><img src="<?php bloginfo('template_directory'); ?>/img/youtube_icon.png" id="tube-game"></a>
			
			<?php
        $youtube_id = 'oVYQjlR81us';
	      echo '<iframe class="home-highlights" src="http://www.youtube.com/embed/'
	      .$youtube_id.'?autoplay=1&loop=1" allowfullscreen></iframe>';        
	    ?>

		</div>
	</div>

<?php get_footer( 'shop' ); ?>
