<?php
/**
 * The header for coalition theme homepage
 *
 * @package CT_Custom 
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<!--- Linking web Fonts--->
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans&family=Ubuntu&display=swap"
		rel="stylesheet">
	<link rel="stylesheet" href="https://use.typekit.net/buw6mth.css">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site homepage">
		<a class="skip-link screen-reader-text" href="#content">
			<?php esc_html_e('Skip to content', 'ct-custom'); ?>
		</a>

		<header id="masthead" class="site-header">
			<div class="site-branding">
				<div class="homepage-up-bar orange-text ">
					<div class="homepage-view homepage-up-bar-flex">
						<div>
							<span class="bebas-neue-font">CALL US NOW!&nbsp;&nbsp;&nbsp; </span>
							<span class="white-text bebas-neue-font">385.154.11.28.3</span>
						</div>
						<div>
							<span class="bebas-neue-font">LOGIN&nbsp;&nbsp;&nbsp; </span>
							<span class="white-text bebas-neue-font"> SIGNUP</span>
						</div>
					</div>

				</div>


				<div class="homepage-view homepage-middle-bar-flex">
					<div class="homepage-middle-bar-element homepage-middle-bar-logo">
						<?php
						if (function_exists('the_custom_logo') && has_custom_logo()):
							the_custom_logo(); ?>

						<?php
						else:
							?>
						<p class="homepage-logo-title bebas-neue-font">YOUR <span class="orange-text">LOGO</span></p>
						<?php
						endif;
						?>
					</div>
					<div class="homepage-middle-bar-element homepage-middle-bar-nav">
						<nav id="site-navigation" class="main-navigation myriad-pro-font height-full">
							<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
								<?php esc_html_e('Primary Menu', 'ct-custom'); ?>
							</button>
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id' => 'primary-menu',
								)
							);
							?>
						</nav><!-- #site-navigation -->
					</div>

				</div>
				<div class="homepage-view ">

					<?php
					if (function_exists('yoast_breadcrumb')) {
						yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
					}
					?>
				</div>
			</div>


			<?php
			$ct_custom_description = get_bloginfo('description', 'display');
			if ($ct_custom_description || is_customize_preview()):
				?>
				<p class="site-description"><?php echo $ct_custom_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
	</div><!-- .site-branding -->


	</header><!-- #masthead -->

	<div id="content" class="site-content">