<?php
// Đăng ký các post type
function university_post_types()
{
    // Đăng ký post type cho sự kiện
    register_post_type('event', array(
        'labels' => array(
            'name' => 'Events',
            'singular_name' => 'Event',
            'add_new_item' => 'Add New Event',
            'edit_item' => 'Edit Event',
            'all_items' => 'All Events',
            'view_item' => 'View Event',
            'not_found' => 'No events found',
            'not_found_in_trash' => 'No events found in Trash'
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'events'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-calendar-alt',
    ));

    // Đăng ký post type cho slide
    register_post_type('slide', array(
        'labels' => array(
            'name' => 'Slides',
            'singular_name' => 'Slide',
            'add_new_item' => 'Add New Slide',
            'edit_item' => 'Edit Slide',
            'all_items' => 'All Slides',
            'view_item' => 'View Slide',
            'not_found' => 'No slide found',
            'not_found_in_trash' => 'No slide found in Trash'
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'slide'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-slides',
    ));

    // Đăng ký post type cho program
    register_post_type('program', array(
        'labels' => array(
            'name' => 'Programs',
            'singular_name' => 'Program',
            'add_new_item' => 'Add New Program',
            'edit_item' => 'Edit Program',
            'all_items' => 'All Programs',
            'view_item' => 'View Program',
            'not_found' => 'No programs found',
            'not_found_in_trash' => 'No Programs found in Trash'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-format-aside',
    ));

    // Đăng ký post type cho professors
    register_post_type('professors', array(
        'labels' => array(
            'name' => 'Professors',
            'singular_name' => 'Professors',
            'add_new_item' => 'Add New Professors',
            'edit_item' => 'Edit Professors',
            'all_items' => 'All Professors',
            'view_item' => 'View Professors',
            'not_found' => 'No Professors found',
            'not_found_in_trash' => 'No Professors found in Trash'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-welcome-add-page',
    ));
}

add_action('init', 'university_post_types');

// Thêm taxonomy cho sự kiện
function university_event_taxonomy()
{
    register_taxonomy('event_category', 'event', array(
        'labels' => array(
            'name' => 'Event Categories',
            'singular_name' => 'Event Category',
            'search_items' => 'Search Event Categories',
            'all_items' => 'All Event Categories',
            'edit_item' => 'Edit Event Category',
            'update_item' => 'Update Event Category',
            'add_new_item' => 'Add New Event Category',
            'new_item_name' => 'New Event Category Name',
            'menu_name' => 'Categories',
        ),
        'hierarchical' => true,
        'public' => true,
        'show_admin_column' => true,
        'rewrite' => array('slug' => 'event-category'),
    ));
}

add_action('init', 'university_event_taxonomy');

// Thêm trường tùy chỉnh cho sự kiện
function university_event_meta()
{
    add_meta_box('event_date', 'Event Date', 'university_event_date_callback', 'event', 'normal', 'high');
}

// Thêm trường tùy chỉnh cho slide
function university_slide_meta()
{
    add_meta_box('slide_info', 'Slide Information', 'university_slide_info_callback', 'slide', 'normal', 'high');
}

add_action('add_meta_boxes', 'university_event_meta');
add_action('add_meta_boxes', 'university_slide_meta');

// Callback cho trường tùy chỉnh của sự kiện
function university_event_date_callback($post)
{
    echo '<input type="date" name="event_date" value="' . get_post_meta($post->ID, 'event_date', true) . '">';
}

// Callback cho trường tùy chỉnh của slide
function university_slide_info_callback($post)
{
    echo '<input type="text" name="slide_info" value="' . get_post_meta($post->ID, 'slide_info', true) . '">';
}

// Hỗ trợ hình ảnh 
function my_theme_setup()
{
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'my_theme_setup');

// Lưu ngày sự kiện
function save_event_date($post_id)
{
    if (!isset($_POST['event_date']) || !current_user_can('edit_post', $post_id)) {
        return;
    }

    $eventDate = sanitize_text_field($_POST['event_date']);
    $formattedDate = date('Y-m-d', strtotime($eventDate));
    update_post_meta($post_id, 'event_date', $formattedDate);
}

add_action('save_post', 'save_event_date');


// Thêm tùy chọn logo vào Customizer
function custom_login_customizer($wp_customize)
{
    $wp_customize->add_section('custom_login_section', array(
        'title' => __('Login Page', 'your-text-domain'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('custom_login_logo', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_login_logo_control', array(
        'label' => __('Login Logo', 'your-text-domain'),
        'section' => 'custom_login_section',
        'settings' => 'custom_login_logo',
    )));
}
add_action('customize_register', 'custom_login_customizer');

// Thay đổi logo trên trang đăng nhập
function custom_login_logo()
{
    $logo = get_theme_mod('custom_login_logo', '');
    if ($logo) {
        echo '<style type="text/css">
            #login h1 a {
                background-image: url(' . esc_url($logo) . ');
                background-size: cover !important;
                width: 100px !important;
                height: 100px !important;
                border-radius: 50% !important;
                display: block;
            }
        </style>';
    }
}
add_action('login_enqueue_scripts', 'custom_login_logo');

// Thay đổi liên kết của logo
function custom_login_url()
{
    return 'https://www.facebook.com/';
}
add_filter('login_headerurl', 'custom_login_url');