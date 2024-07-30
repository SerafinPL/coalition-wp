<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *

 */

?>

<?php $options = get_option('theme_options'); ?>

</div><!-- #content -->

<footer id="colophon" class="site-footer">

	<div
		class="wp-block-columns is-layout-flex wp-container-core-columns-is-layout-1 wp-block-columns-is-layout-flex homepage-view">
		<div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow">
			<h2 class="wp-block-heading homepage-content-title max-w-470 wp-container-content-4" style="font-size:23px">
				CONTACT US</h2>
			<?php echo apply_shortcodes('[contact-form-7 id="206c04a" title="Contact form 1"]'); ?>
		</div>

		<div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow">
			<h2 class="wp-block-heading homepage-content-title homepage-content-right wp-container-content-5"
				style="font-size:23px">REACH US</h2>

			<p class="homepage-content-address homepage-content-right wp-container-content-6 myriad-pro-font">
				<span class="homepage-fs-16">Coalition Skills Test</span><br>
				<?php echo $options['address_text_setting1']; ?><br>
				<?php echo $options['address_text_setting2']; ?><br>
				Phone: <?php echo $options['phone_number_setting']; ?><br>
				Fax: <?php echo $options['fax_number_setting']; ?><br><br>
			</p>

			<div class="homepage-content-right">

				<a href='<?php echo $options['facebookurl']; ?>' class="wp-block-social-link-anchor homepage-social-link">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/asset/F.png'); ?>" alt="Facebook">
					<span class="wp-block-social-link-label screen-reader-text">Facebook</span>
				</a>

				<a href='<?php echo $options['twitterurl']; ?>' class="wp-block-social-link-anchor homepage-social-link">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/asset/T.png'); ?>" alt="Twitter">
					<span class="wp-block-social-link-label screen-reader-text">Twitter</span>
				</a>

				<a href='<?php echo $options['linkedinurl']; ?>' class="wp-block-social-link-anchor homepage-social-link">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/asset/IN.png'); ?>" alt="Linkedin">
					<span class="wp-block-social-link-label screen-reader-text">Linkedin</span>
				</a>

				<a href='<?php echo $options['pinteresturl']; ?>' class="wp-block-social-link-anchor homepage-social-link">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/asset/P.png'); ?>" alt="Pinterest">
					<span class="wp-block-social-link-label screen-reader-text">Pinterest</span>
				</a>

			</div>
		</div>
	</div>

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>