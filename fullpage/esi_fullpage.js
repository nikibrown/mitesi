/***************
EVENTS
***************/

jQuery(document).ready(function() {

	//Enable full page scrolling for home page slides
	
	jQuery('#fullpage').fullpage();
	
	//Scroll down button
	
	jQuery('#fullpage .section .scroll_button').on("click", function() {
		jQuery.fn.fullpage.moveSectionDown();
	});
	
	//Swap slide images for responsive layouts
	
	esi_swap_slide_images();
	
});

/***************
FUNCTIONS
***************/

//Swap slide backgrounds for responsive layouts

function esi_swap_slide_images() {

	var current_browser_width = jQuery(window).width();
	
	jQuery('#fullpage .section').each(function () {
	
	if (current_browser_width > 1024) {
		banner_url = jQuery(this).attr("data-banner-desktop");
	} else if (current_browser_width > 768 && current_browser_width <= 1024) {
		banner_url = jQuery(this).attr("data-banner-tablet-landscape");
	} else if (current_browser_width > 480 && current_browser_width <= 768) {
		banner_url = jQuery(this).attr("data-banner-tablet-portrait");
	} else if (current_browser_width > 375 && current_browser_width <= 480) {
		banner_url = jQuery(this).attr("data-banner-mobile-landscape");
	} else if (current_browser_width <= 375) {
		banner_url = jQuery(this).attr("data-banner-mobile-portrait");
	}
	
	if (banner_url) {
	
		jQuery(this).css('background-image', 'url(' + banner_url + ')');
	
	}
	
	});

}


