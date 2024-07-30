<?php
/**
 * CT Custom functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CT_Custom
 */

if (!function_exists('ct_custom_setup')):
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ct_custom_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on CT Custom, use a find and replace
		 * to change 'ct-custom' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('ct-custom', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__('Primary', 'ct-custom'),
			));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));

		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters('ct_custom_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support('custom-logo', array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		));



	}
endif;
add_action('after_setup_theme', 'ct_custom_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ct_custom_content_width()
{
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters('ct_custom_content_width', 640);
}
add_action('after_setup_theme', 'ct_custom_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ct_custom_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'ct-custom'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'ct-custom'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));
}
add_action('widgets_init', 'ct_custom_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function ct_custom_scripts()
{
	wp_enqueue_style('ct-custom-style', get_stylesheet_uri());

	wp_enqueue_style('ct-custom-homepage', get_template_directory_uri() . '/homepage.css');

	wp_enqueue_style('ct-custom-fonts', get_template_directory_uri() . '/fonts.css');

	wp_enqueue_script('ct-custom-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);

	wp_enqueue_script('ct-custom-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'ct_custom_scripts');



/*CUSTOM theme options



function my_theme_options_page() {
    ?>

    <div class="wrap">
    <h1>Special Theme Options</h1>
    <form method="post" action="options.php">
        <?php
            settings_fields('my-theme-settings-group');
            do_settings_sections('my-theme-settings-group');
            submit_button();
        ?>
    </form>
    </div>
    <?php
}




function my_setting_callback() {
    $setting = esc_attr(get_option('my-setting'));
    echo "<input type='text' name='my-setting' value='$setting' />";
}

function my_theme_settings() {
	add_settings_field('my-setting', 'My Setting', 'my_setting_callback', 'my-theme-options', 'my-theme-settings-group');
    register_setting('my-theme-settings-group', 'my-setting');
	
}




add_action('admin_init', 'my_theme_settings');


function my_theme_menu() {
    add_theme_page('Theme Options', 'Theme Options', 'edit_theme_options', 'my-theme-options', 'my_theme_options_page');
}

add_action('admin_menu', 'my_theme_menu');

/*
add_settings_field('my-setting', 'My Setting', 'my_setting_callback', 'my-theme-options', 'my-theme-settings-group');

function my_setting_callback() {
    $setting = esc_attr(get_option('my-setting'));
    echo "<input type='text' name='my-setting' value='$setting' />";
}

*/


function build_options_page() { ?>
<div id="theme-options-wrap">
	<div class="icon32" id="icon-tools"> <br /> </div>
	<h1>Special Theme Settings</h1>
	<form method="post" action="options.php" enctype="multipart/form-data">
		<?php settings_fields('theme_options'); ?>
		<?php do_settings_sections(__FILE__); ?>
		<p class="submit">
			<input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Settings'); ?>" />
		</p>
	</form>
</div>
<?php }
add_action('admin_init', 'register_and_build_fields');
function register_and_build_fields() {
	register_setting('theme_options', 'theme_options', 'validate_setting');
	add_settings_section('address_settings', 'Address Settings', 'section_address', __FILE__);

	add_settings_section('social_settings', 'Social Links Settings', 'section_social', __FILE__);

	function section_address() {}
	function section_social() {}
	add_settings_field('address_text1', 'Address Text 1', 'address_text_setting1', __FILE__, 'address_settings');
	add_settings_field('address_text2', 'Address Text 2', 'address_text_setting2', __FILE__, 'address_settings');

	add_settings_field('phone_number', 'Phone Number', 'phone_number_setting', __FILE__, 'address_settings');
	add_settings_field('fax_number', 'Fax Number', 'fax_number_setting', __FILE__, 'address_settings');


	add_settings_field('facebookurl', 'Facebook URL', 'facebookurl', __FILE__, 'social_settings');
	add_settings_field('twitterurl', 'Twitter URL', 'twitterurl', __FILE__, 'social_settings');
	add_settings_field('linkedinurl', 'Linkedin URL', 'linkedinurl', __FILE__, 'social_settings');
	add_settings_field('pinteresturl', 'Pinterest URL', 'pinteresturl', __FILE__, 'social_settings');
}
function validate_setting($theme_options) {
	return $theme_options;
}
function address_text_setting1() {
	$options = get_option('theme_options');  echo "<input name='theme_options[address_text_setting1]' type='text' value='{$options['address_text_setting1']}' />";
}

function address_text_setting2() {
	$options = get_option('theme_options');  echo "<input name='theme_options[address_text_setting2]' type='text' value='{$options['address_text_setting2']}' />";
}

function phone_number_setting() {
	$options = get_option('theme_options');  echo "<input name='theme_options[phone_number_setting]' type='text' value='{$options['phone_number_setting']}' />";
}
function fax_number_setting() {
	$options = get_option('theme_options');  echo "<input name='theme_options[fax_number_setting]' type='text' value='{$options['fax_number_setting']}' />";
}

function facebookurl() {
	$options = get_option('theme_options');  echo "<input name='theme_options[facebookurl]' type='url' value='{$options['facebookurl']}' />";
}

function twitterurl() {
	$options = get_option('theme_options');  echo "<input name='theme_options[twitterurl]' type='url' value='{$options['twitterurl']}' />";
}

function linkedinurl() {
	$options = get_option('theme_options');  echo "<input name='theme_options[linkedinurl]' type='url' value='{$options['linkedinurl']}' />";
}

function pinteresturl() {
	$options = get_option('theme_options');  echo "<input name='theme_options[pinteresturl]' type='url' value='{$options['pinteresturl']}' />";
}


add_action('admin_menu', 'theme_options_page');
function theme_options_page() {  add_theme_page('Theme Settings', 'Special Theme Settings', 'administrator', __FILE__, 'build_options_page');}



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/inc/woocommerce.php';
}


