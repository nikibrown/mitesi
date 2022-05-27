/***************
GLOBAL VARIABLES
***************/

//Screen width

var esi_browser_width = jQuery(window).width();

//Width mobile menu is triggered

var mobile_trigger_width = 1026;

/***************
EVENTS
***************/

jQuery(document).ready(function(){

	//Toggle top navigation menu when mobile menu button is clicked

	jQuery('#mobile_menu_button').on("click", esi_toggle_top_nav);

	//Close top navigation menu when window is resized

	jQuery(window).on("resize", esi_resize_top_nav);

	//Toggle sub navigation items in top navigation when parent item is clicked

	jQuery('#header ul#menu-main-navigation > li.menu-item-has-children').on("click", esi_toggle_sub_nav);

	//Swap banner images for responsive layouts

	// esi_swap_banner_images();

	//Fancybox for sidebar image widgets

	if (esi_browser_width > mobile_trigger_width) {

		jQuery('#right_sidebar .sidebar_widget a.fancybox').fancybox({
			padding : 0,
			helpers : {
				title : null
			}
		});

	} else {

		jQuery('#right_sidebar .sidebar_widget a.fancybox').on("click", function(event) {
			event.preventDefault();
		});

	}

	//Add gallery grouping for images in the post editor

	jQuery(".media_editor a[href$='.jpg'], .media_editor a[href$='.jpeg'], .media_editor a[href$='.png'], .media_editor a[href$='.gif']").each(function() {

		jQuery(this).attr('rel', 'group');

	});

	//Fancybox for images in the post editor

	if (esi_browser_width > mobile_trigger_width) {

		jQuery(".media_editor a[href$='.jpg'], .media_editor a[href$='.jpeg'], .media_editor a[href$='.png'], .media_editor a[href$='.gif']").fancybox({
			padding : 0,
			helpers : {
				title : null
			}
		});

	} else {

		jQuery(".media_editor a[href$='.jpg'], .media_editor a[href$='.jpeg'], .media_editor a[href$='.png'], .media_editor a[href$='.gif']").on("click", function(event) {
			event.preventDefault();
		});

	}

});

/***************
NAVIGATION MENUS
***************/

//Toggles top navigation menu when mobile menu button is clicked

function esi_toggle_top_nav() {

	jQuery('#header #menu-main-navigation').slideToggle(300, function() {

		jQuery('#mobile_menu_button').toggleClass("open");

	});

}

//Closes top navigation menu when window is resized

function esi_resize_top_nav() {

	var current_browser_width = jQuery(window).width();

	if (current_browser_width > mobile_trigger_width) {

		jQuery('#mobile_menu_button').removeClass("open");
		jQuery('#header #menu-main-navigation').css("display", "");
		jQuery('#header #menu-main-navigation ul').css("display", "");
		jQuery('#header #menu-main-navigation li').removeClass("expanded");

	}

}

//Toggles sub navigation items in top navigation when parent item is clicked

function esi_toggle_sub_nav(e) {

	if (jQuery('#mobile_menu_button').hasClass("open")) {

		var current_menu_item = jQuery(this);

		//Close open menu items

		jQuery('#header ul#menu-main-navigation > li.menu-item-has-children').each(function () {

			if (jQuery(this).not(current_menu_item).hasClass("expanded")) {

				var open_menu_item = jQuery(this);

				jQuery(open_menu_item).find("ul").slideToggle(300, function () {

					jQuery(open_menu_item).removeClass("expanded");

				});

			}

		});

		//Toggle current menu item

		if (jQuery(current_menu_item).hasClass("expanded")) {

			jQuery(current_menu_item).find("ul").slideToggle(300, function () {

				jQuery(current_menu_item).removeClass("expanded");

			});

		} else {

			jQuery(current_menu_item).addClass("expanded");
			jQuery(current_menu_item).find("ul").slideToggle(300);

		}

	}

}

jQuery(document).ready(function( $ ) {
	// https://github.com/davatron5000/FitVids.js
	$('.home iframe[src*="youtube"]').parent().fitVids();
});
