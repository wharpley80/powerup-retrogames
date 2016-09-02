<?php
/*
  Template Name: SNES-Shop Template
*/
?>

<?php get_header( 'shop' ); ?>

<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<h1 class="shop-title">Super Nintendo Shop</h1>

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

			<?php else  : ?>

				<?php snes_loop(); ?>

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

	<div class="snes-top-wrapper">
		<div class="small-12 medium-8 columns text-center">

		<?php

      $args = array(
        'post_type' => 'product',
        'product_cat' => 'snes-bundle'
      );

      $the_query = new WP_Query($args);

    ?>

      <div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
        <ul class="orbit-container">
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
            <figcaption class="orbit-caption"><?php the_title(); ?></figcaption>
          </li>

          <?php endwhile; endif; ?>

        </ul>

        <?php rewind_posts(); ?>
        
        <nav class="orbit-bullets">

          <?php if (  have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

            <button class="<?php if ($the_query->current_post == 0) : ?>is-active<?php endif; ?>" 
            	data-slide="<?php echo $the_query->current_post; ?>"><span class="show-for-sr">First slide details.</span>
            	<span class="show-for-sr">Current Slide</span>
            </button>

          <?php endwhile; endif; ?>

        </nav>
        
      </div>
		</div>

		<div class="small-12 medium-4 columns" id="donkey-kong">
		</div>
	</div>
</div>

<div class="snes-content-cont">
	<div class="small-12 large-5 columns" id="game-cont-left">
		<h2>Super Nintendo</h2>
		<hr>
		<p>
			The SNES launched the start of the Mario Kart and Donkey Kong Country franchises. Along with 
			several other notable titles, this is a must own console for any gamer. If you owned this console 
			growing up then let us take you back in time, and if you've never owned this console then you truly 
			don't know what you're missing. Check out our bundles and games as we offer a variety of pricing 
			options based on condition and whether or not you want all original or are happy with brand new third 
			party accessories which will allow you to start playing for a lower price.
		</p>
	</div>
	<div class="small-12 large-7 columns" id="game-cont-right">
		<a href="https://www.youtube.com/channel/UCyxa1OESMqK7V68zRscpHdA"><img src="<?php bloginfo('template_directory'); ?>/img/youtube_icon.png" id="tube-game"></a>
		
		<?php
			$youtube_id = '29C7SZW30pA';
		  echo '<iframe class="home-highlights" src="http://www.youtube.com/embed/'
		  .$youtube_id.'?autoplay=1&loop=1" allowfullscreen></iframe>'; 
	  ?>

	</div>
</div>

<?php get_footer( 'shop' ); ?>