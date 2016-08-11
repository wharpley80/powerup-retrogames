<?php get_header(); ?>
<div class="row no-max pad">
	<div class="container">
		<div class="small-12 large-8 columns text-center">

			<div class="orbit" role="region" data-orbit>
	      <ul class="orbit-container">
	      	<button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
          <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
				  <li class="is-active orbit-slide">
				    <a href="<?php bloginfo('url'); ?>/?p=20"><img class="display-img" src="<?php bloginfo('template_directory'); ?>/img/NES_Display.jpg" alt="slide 1" /></a>
				    <figcaption class="orbit-caption">NES</figcaption>
				  </li>
				  <li class="orbit-slide">
				    <a href="<?php bloginfo('url'); ?>/?p=18"><img class="display-img" src="<?php bloginfo('template_directory'); ?>/img/SNES_Display.jpg" alt="slide 2" /></a>
				    <figcaption class="orbit-caption">SNES</figcaption>
				  </li>
				  <li class="orbit-slide">
				    <a href="<?php bloginfo('url'); ?>/?p=20"><img class="display-img" src="<?php bloginfo('template_directory'); ?>/img/Genesis_Display.jpg" alt="slide 3" /></a>
				    <figcaption class="orbit-caption">Genesis</figcaption>
				  </li>
				</ul>
			</div>

		</div>

		<?php get_sidebar(); ?>

	</div>
</div>

<div class="controller-cont">

<div class="mario">

	<div class="small-12 large-4 columns" id="video-side">
		<h2 id="retro-style">Subscribe</h2>
		<hr>
		<p>
			Subscribe to our YouTube channel and laugh at our gameplay. We are continually adding walkthroughs
			of classic games for your entertainment.
		</p>
		<a href="https://www.youtube.com/channel/UCR38p1O7s2KyLlJwV0yb8Ew"><img src="<?php bloginfo('template_directory'); ?>/img/youtube_icon.png" class="tube-img"></a>
	</div>

	<div class="small-12 large-8 columns" id="video">
		<video class="highlights" autoplay controls loop>
		  <source src="<?php bloginfo('template_directory'); ?>/video/MarioWorls.mp4" type="video/mp4">
		  <source src="<?php bloginfo('template_directory'); ?>/video/MarioWorls.mov" type="video/mov">
			Your browser does not support the video tag.
		</video>
	</div>

</div>

<div class="trust-div">

	<div class="small-12 hide-for-large columns" id="video-side">
		<h2 id="retro-style">Our Collection</h2>
		<hr>
		<p>
			Everything we sell has been cared for and treated like it was our own, and that's because it was. We pride 
			ourselves in taking care of these classics and making them as close to new as possible. After refurbishing we
			spend time playing and testing everything to make sure that you're receiving a proven product, this is our favorite
			part of doing what we do. Obliviously all this stuff is 20-30 years old so cosmetic condition will vary, and 
			that's why we price each item accordingly. 
		</p>
	</div>

	<div class="small-12 large-7 columns">
		<img src="<?php bloginfo('template_directory'); ?>/img/snes_lot.jpg" class="trust-img">
	</div>

	<div class="large-5 columns" id="trust-side">
		<h2 id="retro-style">Our Collection</h2>
		<hr>
		<p>
			Everything we sell has been cared for and treated like it was our own, and that's because it was. We pride 
			ourselves in taking care of these classics and making them as close to new as possible. After refurbishing we
			spend time playing and testing everything to make sure that you're receiving a proven product, this is our favorite
			part of doing what we do. Obliviously all this stuff is 20-30 years old so cosmetic condition will vary, and 
			that's why we price each item accordingly. 
		</p>
	</div>
		
</div>

<div class="reg-div">

	<div class="container">
	<?php// if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

		<div class="small-12 medium-6 columns" id="reg-left-side">
			<h2 id="retro-style"><?php _e( 'Register', 'woocommerce' ); ?></h2>
			<hr>
			<p>
				Register so you can contribute to our forum. We will also notify you when we've added new 
				walkthroughs or products of your interest.
			</p>
		</div>
		<div class="small-12 medium-6 columns" id="reg-side">

			<div class="u-column2 col-2">

				<form method="post" class="register">

					<?php do_action( 'woocommerce_register_form_start' ); ?>

					<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

						<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
							<label for="reg_username"><?php _e( 'Username', 'woocommerce' ); ?> <span class="required">*</span></label>
							<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
						</p>

					<?php endif; ?>

					<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
						<label for="reg_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
						<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>" />
					</p>

					<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

						<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
							<label for="reg_password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
							<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" />
						</p>

					<?php endif; ?>

					<!-- Spam Trap -->
					<div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php _e( 'Anti-spam', 'woocommerce' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>

					<?php do_action( 'woocommerce_register_form' ); ?>
					<?php do_action( 'register_form' ); ?>

					<p class="woocomerce-FormRow form-row">
						<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
						<input type="submit" class="woocommerce-Button button" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>" />
					</p>

					<?php do_action( 'woocommerce_register_form_end' ); ?>

				</form>

			</div>

		</div>

	<?php //endif; ?>
	</div>

</div>

</div>
<!--
<section class="row">
  <div class="small-12 columns text-center">
    <div class="leader">
    
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
      <h1><?php the_title(); ?></h1>
      <p><?php the_content(); ?></p>        

	  <?php endwhile; endif; ?>
    
    </div>
  </div>
</section>

<?php get_template_part('content', 'portfolio'); ?>
-->
<?php get_footer(); ?>