<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title><?php

	//Blog name

	bloginfo( 'name' );

	// Add the site tagline for the home page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
	echo " | $site_description";

	//Page title

	wp_title( '|', true, 'left' );

	?>
	</title>

<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
	<?php wp_head(); ?>

	<link type="image/x-icon" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicon.png" rel="Shortcut Icon">
<!--<script src="https://use.fontawesome.com/7d1c0302b4.js"></script>-->
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<body <?php body_class(); ?>>

	<?php
		$enable_notice_bar =  get_field( "enable_notice_bar", 45 );  // Notice bar is enabled in /wp-admin/post.php?post=45&action=edit
		$notice_bar_text =  get_field( "notice_bar_text", 45 );
		$notice_bar_button_text =  get_field( "notice_bar_button_text", 45 );
		$notice_bar_button_link =  get_field( "notice_bar_button_link", 45 );
		$notice_bar_text_color =  get_field( "notice_bar_text_color", 45 );
		$notice_bar_background_color =  get_field( "notice_bar_background_color", 45 );
		$notice_bar_start_date =  strtotime(get_field( "notice_bar_start_date", 45 ));
		$notice_bar_end_date =  strtotime(get_field( "notice_bar_end_date", 45 ));
		$now = strtotime("now");
	?>
	<?php if ( $notice_bar_start_date <= $now && $notice_bar_end_date >= $now && $enable_notice_bar == 1) :  ?>
		<div class="mit_notice_bar" style="color: <?php echo $notice_bar_text_color; ?>!important; background: <?php echo $notice_bar_background_color; ?>!important;">
			<?php echo $notice_bar_text; ?>
			<?php if ( $notice_bar_button_text && $notice_bar_button_link ) { ?>
				<a style="text-decoration: underline; color: <?php echo $notice_bar_text_color; ?>!important;" target="_blank" href="<?php echo $notice_bar_button_link; ?>">
					<?php echo ' ' . $notice_bar_button_text; ?>
				</a>
			<?php } ?>
			<a style="color: <?php echo $notice_bar_text_color; ?>!important;" href="#"><i class="notice-bar-close fa fa-close" aria-hidden="true"></i></a>
		</div>
	<?php endif; ?>
