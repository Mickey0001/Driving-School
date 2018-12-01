<?php
/**
 * WP Bootstrap Starter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP_Driving_School
 */

if (!function_exists('wp_driving_school_setup')):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
    function wp_driving_school_setup()
{
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on WP Bootstrap Starter, use a find and replace
         * to change 'wp_driving_school' to the name of your theme in all the template files.
         */
        load_theme_textdomain('wp_driving_school', get_template_directory() . '/languages');

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
        register_nav_menus(array(
            'primary' => esc_html__('Primary', 'wp_driving_school'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'comment-form',
            'comment-list',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('wp_driving_school_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        function wp_driving_school_add_editor_styles()
    {
            add_editor_style('custom-editor-style.css');
        }
        add_action('admin_init', 'wp_driving_school_add_editor_styles');

    }
endif;
add_action('after_setup_theme', 'wp_driving_school_setup');

/**
 * Add Welcome message to dashboard
 */
function wp_driving_school_reminder()
{
    $theme_page_url = 'https://afterimagedesigns.com/wp_driving_school/?dashboard=1';

    if (!get_option('triggered_welcomet')) {
        $message = sprintf(__('Welcome to Driving School Theme! Before diving in to your new theme, please visit the <a style="color: #fff; font-weight: bold;" href="%1$s" target="_blank">theme\'s</a> page for access to dozens of tips and in-depth tutorials.', 'wp_driving_school'),
            esc_url($theme_page_url)
        );

        printf(
            '<div class="notice is-dismissible" style="background-color: #6C2EB9; color: #fff; border-left: none;">
                        <p>%1$s</p>
                    </div>',
            $message
        );
        add_option('triggered_welcomet', '1', '', 'yes');
    }

}
add_action('admin_notices', 'wp_driving_school_reminder');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_driving_school_content_width()
{
    $GLOBALS['content_width'] = apply_filters('wp_driving_school_content_width', 1170);
}
add_action('after_setup_theme', 'wp_driving_school_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_driving_school_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'wp_driving_school'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'wp_driving_school'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer 1', 'wp_driving_school'),
        'id' => 'footer-1',
        'description' => esc_html__('Add widgets here.', 'wp_driving_school'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer 2', 'wp_driving_school'),
        'id' => 'footer-2',
        'description' => esc_html__('Add widgets here.', 'wp_driving_school'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer 3', 'wp_driving_school'),
        'id' => 'footer-3',
        'description' => esc_html__('Add widgets here.', 'wp_driving_school'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'wp_driving_school_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function wp_driving_school_scripts()
{
    // load bootstrap css
    wp_enqueue_style('wp_driving_school-bootstrap-css', get_template_directory_uri() . '/inc/assets/css/bootstrap.min.css');
    // fontawesome cdn
    wp_enqueue_style('wp-bootstrap-pro-fontawesome-cdn', 'https://use.fontawesome.com/releases/v5.1.0/css/all.css');
    // load bootstrap css
    // load AItheme styles
    // load WP Bootstrap Starter styles
    wp_enqueue_style('wp_driving_school-style', get_stylesheet_uri());
    if (get_theme_mod('theme_option_setting') && get_theme_mod('theme_option_setting') !== 'default') {
        wp_enqueue_style('wp_driving_school-' . get_theme_mod('theme_option_setting'), get_template_directory_uri() . '/inc/assets/css/presets/theme-option/' . get_theme_mod('theme_option_setting') . '.css', false, '');
    }
    if (get_theme_mod('preset_style_setting') === 'poppins-lora') {
        wp_enqueue_style('wp_driving_school-poppins-lora-font', 'https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i|Poppins:300,400,500,600,700');
    }
    if (get_theme_mod('preset_style_setting') === 'montserrat-merriweather') {
        wp_enqueue_style('wp_driving_school-montserrat-merriweather-font', 'https://fonts.googleapis.com/css?family=Merriweather:300,400,400i,700,900|Montserrat:300,400,400i,500,700,800');
    }
    if (get_theme_mod('preset_style_setting') === 'poppins-poppins') {
        wp_enqueue_style('wp_driving_school-poppins-font', 'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700');
    }
    if (get_theme_mod('preset_style_setting') === 'roboto-roboto') {
        wp_enqueue_style('wp_driving_school-roboto-font', 'https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i');
    }
    if (get_theme_mod('preset_style_setting') === 'arbutusslab-opensans') {
        wp_enqueue_style('wp_driving_school-arbutusslab-opensans-font', 'https://fonts.googleapis.com/css?family=Arbutus+Slab|Open+Sans:300,300i,400,400i,600,600i,700,800');
    }
    if (get_theme_mod('preset_style_setting') === 'oswald-muli') {
        wp_enqueue_style('wp_driving_school-oswald-muli-font', 'https://fonts.googleapis.com/css?family=Muli:300,400,600,700,800|Oswald:300,400,500,600,700');
    }
    if (get_theme_mod('preset_style_setting') === 'montserrat-opensans') {
        wp_enqueue_style('wp_driving_school-montserrat-opensans-font', 'https://fonts.googleapis.com/css?family=Montserrat|Open+Sans:300,300i,400,400i,600,600i,700,800');
    }
    if (get_theme_mod('preset_style_setting') === 'robotoslab-roboto') {
        wp_enqueue_style('wp_driving_school-robotoslab-roboto', 'https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700|Roboto:300,300i,400,400i,500,700,700i');
    }
    if (get_theme_mod('preset_style_setting') && get_theme_mod('preset_style_setting') !== 'default') {
        wp_enqueue_style('wp_driving_school-' . get_theme_mod('preset_style_setting'), get_template_directory_uri() . '/inc/assets/css/presets/typography/' . get_theme_mod('preset_style_setting') . '.css', false, '');
    }
    //Color Scheme
    /*if(get_theme_mod( 'preset_color_scheme_setting' ) && get_theme_mod( 'preset_color_scheme_setting' ) !== 'default') {
    wp_enqueue_style( 'wp_driving_school-'.get_theme_mod( 'preset_color_scheme_setting' ), get_template_directory_uri() . '/inc/assets/css/presets/color-scheme/'.get_theme_mod( 'preset_color_scheme_setting' ).'.css', false, '' );
    }else {
    wp_enqueue_style( 'wp_driving_school-default', get_template_directory_uri() . '/inc/assets/css/presets/color-scheme/blue.css', false, '' );
    }*/

    wp_enqueue_script('jquery');

    // Internet Explorer HTML5 support
    wp_enqueue_script('html5hiv', get_template_directory_uri() . '/inc/assets/js/html5.js', array(), '3.7.0', false);
    wp_script_add_data('html5hiv', 'conditional', 'lt IE 9');

    // load bootstrap js
    wp_enqueue_script('wp_driving_school-popper', get_template_directory_uri() . '/inc/assets/js/popper.min.js', array(), '', true);
    wp_enqueue_script('wp_driving_school-bootstrapjs', get_template_directory_uri() . '/inc/assets/js/bootstrap.min.js', array(), '', true);
    wp_enqueue_script('wp_driving_school-themejs', get_template_directory_uri() . '/inc/assets/js/theme-script.min.js', array(), '', true);
    wp_enqueue_script('wp_driving_school-skip-link-focus-fix', get_template_directory_uri() . '/inc/assets/js/skip-link-focus-fix.min.js', array(), '20151215', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'wp_driving_school_scripts');

function wp_driving_school_password_form()
{
    global $post;
    $label = 'pwbox-' . (empty($post->ID) ? rand() : $post->ID);
    $o = '<form action="' . esc_url(site_url('wp-login.php?action=postpass', 'login_post')) . '" method="post">
    <div class="d-block mb-3">' . __("To view this protected post, enter the password below:", "wp_driving_school") . '</div>
    <div class="form-group form-inline"><label for="' . $label . '" class="mr-2">' . __("Password:", "wp_driving_school") . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" class="form-control mr-2" /> <input type="submit" name="Submit" value="' . esc_attr__("Submit", "wp_driving_school") . '" class="btn btn-primary"/></div>
    </form>';
    return $o;
}
add_filter('the_password_form', 'wp_driving_school_password_form');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load plugin compatibility file.
 */
require get_template_directory() . '/inc/plugin-compatibility/plugin-compatibility.php';

/**
 * Load custom WordPress nav walker.
 */
if (!class_exists('wp_driving_school_navwalker')) {
    require_once get_template_directory() . '/inc/wp_driving_school_navwalker.php';
}
