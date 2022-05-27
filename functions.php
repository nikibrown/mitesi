<?php

/***************
GENERAL SETTINGS
***************/

//Add support for post thumbnails
add_theme_support('post-thumbnails');

//Load scripts

function esi_include_scripts()
{

    //Register style sheets

    wp_register_style('esi_styles', get_template_directory_uri() . '/style.css');
    wp_register_style('fancybox_styles', get_template_directory_uri() . '/fancybox/jquery.fancybox.css');
    wp_register_style('font_awesome_css', get_template_directory_uri() . '/css/font-awesome.min.css');

    if (is_front_page()) {
        wp_register_style('fullpage_styles', get_template_directory_uri() . '/fullpage/jquery.fullPage.css');
    }

    //Enqueue style sheets

    wp_enqueue_style('esi_styles');
    wp_enqueue_style('fancybox_styles');

    if (is_front_page()) {
        wp_enqueue_style('fullpage_styles');
    }

    //Register JS files

    // wp_register_script( 'google_maps', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', 'jquery');
    // wp_register_script( 'map_functions', get_template_directory_uri() . '/js/google_maps.js', 'jquery');
    wp_register_script('fancybox', get_template_directory_uri() . '/fancybox/jquery.fancybox.pack.js', 'jquery');
    wp_register_script('esi_functions', get_template_directory_uri() . '/js/esi_functions.js', 'jquery');
    wp_localize_script('esi_functions', 'myAjax', array( 'ajaxurl' => admin_url('admin-ajax.php')));

    if (is_front_page()) {
        wp_register_script('fullpage', get_template_directory_uri() . '/fullpage/jquery.fullPage.min.js', 'jquery');
        wp_register_script('esi_fullpage', get_template_directory_uri() . '/fullpage/esi_fullpage.js', 'jquery');
    }

    wp_register_script('fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', 'jquery');
    wp_enqueue_script('fitvids');

    //Enqueue jQuery and functions file
    wp_enqueue_script('jquery');
    wp_enqueue_script('google_maps');
    wp_enqueue_script('map_functions');
    wp_enqueue_script('fancybox');
    wp_enqueue_script('esi_functions');

    if (is_front_page()) {
        wp_enqueue_script('fullpage');
        wp_enqueue_script('esi_fullpage');
    }
}

add_action('wp_enqueue_scripts', 'esi_include_scripts');

//Add hr button to editor

function esi_enable_text_buttons($buttons)
{
    $buttons[] = 'hr';

    return $buttons;
}

add_filter("mce_buttons", "esi_enable_text_buttons");

//Gets text for read more link

function esi_get_read_more_text()
{
    $read_more_text = "Read More";

    return $read_more_text;
}

//More link style for except

function esi_new_excerpt_more($more)
{
    return '...';
}

add_filter('excerpt_more', 'esi_new_excerpt_more');

//Assigns body class

function esi_assign_body_class()
{
    return $body_class;
}

/***************
ACF FILTERS
***************/

//Filters out drafts from relationship fields

function esi_relationship_query($args, $field, $post)
{
    $args['post_status'] = "publish";

    return $args;
}

//Filter for every relationship field

add_filter('acf/fields/relationship/query', 'esi_relationship_query', 10, 3);

/***************
CUSTOM ADMIN COLUMNS
***************/

//Register custom admin columns

function or_register_custom_admin_columns($columns)
{
    $columns['site_section'] = 'Site Section';
    unset($columns['comments']);
    return $columns;
}

add_filter('manage_pages_columns', 'or_register_custom_admin_columns');

//Populate custom admin columns

function or_populate_custom_admin_columns($column, $post_id)
{
    if ($column == 'site_section') {
        $site_section = get_field('page_section', $post_id);

        $field = get_field_object('page_section');
        $choices = $field['choices'];
        if ($choices):
            foreach ($choices as $value => $label) {
                if ($value == $site_section) {
                    echo $label;
                }
            }
        endif;
    }
}

add_action('manage_pages_custom_column', 'or_populate_custom_admin_columns', 10, 2);

//Register sortable custom admin columns

function or_register_sortable_custom_admin_columns($columns)
{
    $columns['site_section'] = 'page_section';

    return $columns;
}

add_filter('manage_edit-page_sortable_columns', 'or_register_sortable_custom_admin_columns');


/*********************
TIMELINE EXPRESS IMAGE SIZE SETTINGS
*********************/

function custom_timeline_express_announcement_image_size($image_size, $post_id)
{
    $image_size = 'full';
    return $image_size;
}
add_filter('timeline-express-announcement-img-size', 'custom_timeline_express_announcement_image_size', 10, 2);

/***************
CONTACT INFO
***************/

//Gets array of site contact info

function esi_get_contact_info()
{
    $contact = new WP_Query();
    $contact->query(array(
                    'post_type' => 'site-settings',
                    'order' => 'ASC',
                    'posts_per_page' => 1
                ));

    $contact_info = array(); ?>

	<?php if ($contact->have_posts()) : ?>

		<?php while ($contact->have_posts()): $contact->the_post(); ?>

		<?php

        //Get contact info fields

        $contact_info["department_name"] = get_field('contact_department_name');
    $contact_info["address_one"] = get_field('contact_address_one');
    $contact_info["address_two"] = get_field('contact_address_two');
    $contact_info["city"] = get_field('contact_city');
    $contact_info["state"] = get_field('contact_state');
    $contact_info["zip_code"] = get_field('contact_zip_code');
    $contact_info["email_address"] = get_field('contact_email_address');
    $contact_info["phone_number"] = get_field('contact_phone_number');
    $contact_info["fax_number"] = get_field('contact_fax_number');
    $contact_info["youtube_url"] = get_field('contact_youtube_url');
    $contact_info["twitter_url"] = get_field('contact_twitter_url');
    $contact_info["facebook_url"] = get_field('contact_facebook_url');
    $contact_info["map"] = get_field('contact_map'); ?>

		<?php endwhile; ?>

	<?php endif; ?>

<?php

//Restore original post data
wp_reset_postdata();

    return $contact_info;
}

//Displays contact info

function esi_display_contact_info()
{

    //Get contact info
    $contact_info = esi_get_contact_info(); ?>

	<?php if ($contact_info) : ?>

		<div class="contact_info">

			<div class="address_wrapper">
				<?php echo($contact_info["department_name"]); ?><br />
				<?php if ($contact_info["address_one"]) : ?>
				<?php echo($contact_info["address_one"]); ?>
				<?php endif; ?>
				<?php if ($contact_info["address_two"]) : ?>
				<br /><?php echo($contact_info["address_two"]); ?>
				<?php endif; ?>
				<?php if (($contact_info["city"]) && ($contact_info["state"]) && ($contact_info["zip_code"])) : ?>
				<br /><?php echo($contact_info["city"]); ?>, <?php echo($contact_info["state"]); ?> <?php echo($contact_info["zip_code"]); ?>
				<?php endif; ?>
			</div>

			<div class="contact_divider">
				<?php if ($contact_info["phone_number"]) : ?>
				<span class="contact_label">P:</span><?php esi_display_phone_number($contact_info["phone_number"]); ?>
				<?php endif; ?>
				<?php if ($contact_info["fax_number"]) : ?>
				<br /><span class="contact_label">F:</span><?php echo($contact_info["fax_number"]); ?>
				<?php endif; ?>
				<?php if ($contact_info["email_address"]) : ?>
				<br /><span class="contact_label">E:</span><a href="mailto:<?php echo antispambot($contact_info["email_address"]); ?>"><?php echo antispambot($contact_info["email_address"]); ?></a>
				<?php endif; ?>
			</div>

			<?php esi_display_social_icons($contact_info); ?>

		</div>

	<?php endif; ?>

<?php
}

//Displays individual contact info value

function esi_display_contact_attribute($value)
{

    //Get contact info
    $contact_info = esi_get_contact_info(); ?>

	<?php if ($contact_info) : ?>

		<?php if ($value == "address") : ?>

			<div class="address_wrapper">
				<?php echo($contact_info["department_name"]); ?><br />
				<?php if ($contact_info["address_one"]) : ?>
				<?php echo($contact_info["address_one"]); ?>
				<?php endif; ?>
				<?php if ($contact_info["address_two"]) : ?>
				<br /><?php echo($contact_info["address_two"]); ?>
				<?php endif; ?>
				<?php if (($contact_info["city"]) && ($contact_info["state"]) && ($contact_info["zip_code"])) : ?>
				<br /><?php echo($contact_info["city"]); ?>, <?php echo($contact_info["state"]); ?> <?php echo($contact_info["zip_code"]); ?>
				<?php endif; ?>
			</div>

		<?php endif; ?>

		<?php if ($value == "social") : ?>
			<?php esi_display_social_icons($contact_info); ?>
		<?php endif; ?>

		<?php if ($value == "email") : ?><a href="mailto:<?php echo antispambot($contact_info["email_address"]); ?>"><?php echo antispambot($contact_info["email_address"]); ?></a><?php endif; ?>
		<?php if ($value == "phone") : ?><?php esi_display_phone_number($contact_info["phone_number"]); ?><?php endif; ?>
		<?php if ($value == "fax") : ?><?php if ($contact_info["fax_number"]) : ?><?php echo($contact_info["fax_number"]); ?><?php endif; ?><?php endif; ?>

		<?php if ($value == "map") : ?>

			<?php

            $location = $contact_info["map"]; ?>

			<?php if (!empty($location)): ?>

				<div class="acf-map">
					<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
				</div>

			<?php endif; ?>

		<?php endif; ?>

	<?php endif; ?>

<?php
}

//Displays social media icons

function esi_display_social_icons($contact_info)
{
    ?>

	<?php if (($contact_info["facebook_url"]) || ($contact_info["twitter_url"])) : ?>

		<div class="social_icons contact_divider clr">
			<?php if ($contact_info["twitter_url"]) : ?><a href="<?php echo($contact_info["twitter_url"]); ?>" target="_blank" class="twitter_icon">Twitter</a><?php endif; ?>
			<?php if ($contact_info["facebook_url"]) : ?><a href="<?php echo($contact_info["facebook_url"]); ?>" target="_blank" class="facebook_icon">Facebook</a><?php endif; ?>
		</div>

	<?php endif; ?>

<?php
}


//Formats and displays phone numbers

function esi_display_phone_number($phone_number)
{
    $phone_link = preg_replace("/[^0-9]/", "", $phone_number);

    echo('<a href="tel:' . $phone_link . '">' . $phone_number . '</a>');
}

/***************
NAVIGATION MENUS
***************/

//Register navigation menus

add_theme_support('nav-menus');
add_action('init', 'esi_register_menus');
function esi_register_menus()
{
    register_nav_menus(
        array(
            'main-navigation' => __('Main Navigation'),
            'secondary-navigation' => __('Secondary Navigation'),
        )
    );
}

function twentyten_page_menu_args($args)
{
    $args['show_home'] = true;
    return $args;
}
add_filter('wp_page_menu_args', 'twentyten_page_menu_args');

//Displays main navigation menu

function esi_display_main_navigation_menu()
{
    wp_nav_menu(array(
        'theme_location' => 'main-navigation',
        'menu' => 'Main Navigation',
        'container' => false,
        'menu_class' => 'clr'
        ));
}

//Displays left navigation menu

function esi_display_left_navigation_menu()
{
    wp_nav_menu(array(
        'theme_location' => 'left-navigation',
        'menu' => 'Left Navigation',
        'container' => false,
        'menu_id' => 'left-sidebar-navigation'
        ));
}

//Displays secondary navigation menu

function esi_display_secondary_navigation_menu()
{
    wp_nav_menu(array(
        'theme_location' => 'secondary-navigation',
        'menu' => 'Secondary Navigation',
        'container' => false,
        'menu_id' => 'secondary-sidebar-navigation'
        ));
}

/***************
SIDEBAR
***************/

//Right sidebar

function esi_right_sidebar_widgets_init()
{
    register_sidebar(array(
        'name'          => 'Right sidebar',
        'id'            => 'right_sidebar_widgets',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ));
}
add_action('widgets_init', 'esi_right_sidebar_widgets_init');

/***************
POST TYPES
***************/

//Custom post type for site settings

add_action('init', 'esi_settings_init');

function esi_settings_init()
{
    $labels = array(
        'name' => 'Site Settings',
        'singular_name' => 'Settings',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Settings',
        'edit_item' => 'Edit Settings',
        'new_item' => 'New Settings',
        'all_items' => 'All Settings',
        'view_item' => 'View Settings',
        'search_items' => 'Search Settings',
        'not_found' =>  'Settings not found',
        'not_found_in_trash' => 'No Settings found in Trash',
        'menu_name' => 'Site Settings'
      );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        '_builtin' => false,
        '_edit_link' => 'post.php?post=%d',
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'rewrite' => true,
        'supports' => false,
        'show_in_nav_menus' => false,
        'exclude_from_search' => true,
        'menu_position' => 7

    );

    register_post_type('site-settings', $args);
}

//Custom post saves

add_filter('save_post', 'esi_save_posts');

function esi_save_posts($post_id)
{
    $post = get_post($post_id);

    //Save site settings

    if ($post->post_type == 'site-settings') {
        remove_filter('save_post', 'esi_save_posts');

        $department_name = get_field('contact_department_name', $post_id);

        wp_update_post(array( 'ID'=>$post_id, 'post_title'=>$department_name, 'post_name'=> '' ));

        add_filter('save_post', 'esi_save_posts');
    }
}

/***************
SHORTCODES
***************/

//Shortcode function for [contactinfo], displays all site contact info

function shortcode_contactinfo()
{
    ob_start();
    esi_display_contact_info();
    $output_string = ob_get_contents();
    ob_end_clean();

    return $output_string;
}

add_shortcode('contactinfo', 'shortcode_contactinfo');

//Shortcode function for [contactvalue], displays individual contact info value

function shortcode_contactvalue($atts)
{
    extract(shortcode_atts(array(
            'value' => ''
        ), $atts));

    ob_start();
    esi_display_contact_attribute($value);
    $output_string = ob_get_contents();
    ob_end_clean();

    return $output_string;
}

add_shortcode('contactvalue', 'shortcode_contactvalue');
