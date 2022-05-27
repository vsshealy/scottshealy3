<?php 
    /**
     * php/theme/functions/theme.php
     * @package scottshealy
     * @author Scott Shealy
     * @version 1.0.0
     * @copyright 2022
    **/
?>

<?php 
    
    // REPLACE VERSION NUMBER
        if (! defined('_S_VERSION')) {
            define('_S_VERSION', '1.0.0');
        }

    // THEME FEATURE SETUP
        if (! function_exists('scottshealy_setup')):
            function scottshealy_setup() {

                // ADD LANGUAGE TRANSLATIONS
                    load_theme_textdomain('scottshealy', get_template_directory().'/languages');

                // ADD DEFAULT POSTS AND COMMENTS RSS FEED LINKS TO HEAD
                    add_theme_support('automatic-feed-links');

                // ENABLE TITLE TAG SUPPORT
                    add_theme_support('title-tag');

                // ENABLE POST THUMBNAILS
                    add_theme_support('post-thumbnails');

                // REGISTER MENUS
                    register_nav_menus(
                        array(
                            'menu-1' => esc_html__('Header-Primary', 'scottshealy'),
                            'menu-2' => esc_html__('Header-Secondary', 'scottshealy'),
                            'menu-3' => esc_html__('Header-Mobile', 'scottshealy'),
                            'menu-4' => esc_html__('Footer-Primary', 'scottshealy'),
                            'menu-5' => esc_html__('Footer-Secondary', 'scottshealy'),
                            'menu-6' => esc_html__('Footer-Mobile', 'scottshealy'),
                            'menu-7' => esc_html__('Menu-Sticky', 'scottshealy')
                        )
                    );

                // SWITCH DEFAULT CORE MARKUP TO VALID HTML5
                    add_theme_support(
                        'html5', array(
                            'search-form',
                            'comment-form',
                            'comment-list',
                            'gallery',
                            'caption',
                            'style',
                            'script',
                        )
                    );

                // SETUP CUSTOM BACKGROUND FEATURE
                    add_theme_support(
                        'custom-background', apply_filters(
                            'scottshealy_custom_background_args', array(
                                'default-color' => 'ffffff',
                                'default-image' => '',
                            )
                        )
                    );

                // ENABLE SELECTIVE REFRESH FOR WIDGETS
                    add_theme_support('customize-selective-refresh-widgets');

                // ADD SUPPORT FOR CUSTOM LOGO
                    add_theme_support(
                        'custom-logo', array(
                            'height' => 250,
                            'width' => 250,
                            'flex-width' => true,
                            'flex-height' => true,
                        )
                    );
            }
        endif;

        add_action('after_setup_theme', 'scottshealy_setup');

    // SET CONTENT WIDTH
        function scottshealy_content_width() {
            $GLOBALS['content_width'] = apply_filters('scottshealy_base_content_width', 640);
        }

        add_action('after_setup_theme', 'scottshealy_content_width', 0);

    // REGISTER WIDGET AREAS
        function scottshealy_widgets_init() {
            register_sidebar(
                array(
                    'name' => esc_html__('Sidebar', 'scottshealy'),
                    'id' => 'sidebar-1',
                    'description' => esc_html__('Add widgets here.', 'scottshealy'),
                    'before_widget' => '<section id="%1$s" class="widget %2$s">',
                    'after_widget' => '</section>',
                    'before_title' => '<h2 class="widget-title">',
                    'after_title' => '</h2>',
                )
            );
        }

        add_action('widgets_init', 'scottshealy_widgets_init');

    // LOAD SCRIPTS AND STYLES
        function scottshealy_scripts() {
            wp_enqueue_style('scottshealy-style', get_stylesheet_uri(), array(), _S_VERSION);
            wp_style_add_data('scottshealy-style', 'rtl', 'replace');

            wp_enqueue_script('scottshealy-navigation', get_template_directory_uri().'/js/theme/navigation.js', array(), _S_VERSION, true);

            if (is_singular() && comments_open() && get_option('thread_comments')) {
                wp_enqueue_script('comment-reply');
            }
        }
        
        add_action('wp_enqueue_scripts', 'scottshealy_scripts');

    // ENABLE CUSTOM HEADER FEATURE
        require get_template_directory().'/php/theme/inc/custom-header.php';

    // ENABLE TEMPLATE TAGS
        require get_template_directory().'/php/theme/inc/template-tags.php';

    // ENABLE ENHANCED THEME FUNCTIONS
        require get_template_directory().'/php/theme/inc/template-functions.php';

    // ENABLE CUSTOMIZER ADDITIONS
        require get_template_directory().'/php/theme/inc/customizer.php';

    // LOAD JETPACK COMPATABILITY FILE
        if (defined('JETPACK__VERSION')) {
            require get_template_directory().'php/theme/inc/jetpack.php';
        }
?>