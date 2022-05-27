<?php

//Header file

get_header();

?>

	<div id="site_wrapper">

		<div id="site_content">

			<?php

			//Get top bar and fixed header

			get_template_part('topbar');

			?>

			<div id="page_wrapper">

			<?php if (have_posts()): ?>

				<?php while(have_posts()): the_post() ?>
					<div id="section_banner" style='background-image: url("/wp-content/uploads/2019/12/classroom.jpg")'>
						<div id="banner_heading">
							<h1>
								E&S Minor Classes
							</h1>
						</div>
						<div id="banner_overlay">&nbsp;</div>
					</div>

					<div id="page_columns">

						<?php global $post; if ( is_page() && $post->post_parent ) { ?>
						<?php } else { ?>
							<div class="secondary_navigation">
								<div class="container clr">
									<?php esi_display_secondary_navigation_menu(); ?>
								</div>
							</div>
						<?php } ?>

						<div id="page_content" class="clr">

							<div class="container clr">

							<?php

							//Sidebar display setting

							if ( is_active_sidebar( 'right_sidebar_widgets' ) ) {
								$main_content_class = "has_sidebar";
							} else {
								$main_content_class = "no_sidebar";
							}

							?>

							<div id="main_content" class="<?php echo($main_content_class); ?>" role="main">

								<?php //edit_post_link('Edit Page', '<div class="admin_edit_link">', '</div>'); ?>

								<div class="post_formatting media_editor">
									
									<h2><?php the_title(); ?></h2>
									<?php the_content(); ?>
								</div>
									<br />
										
								<h3><?php the_field('subject_number'); ?>: <?php the_field('units'); ?> units, <?php the_field('semester'); ?> semester </h3>
								<br />						
								<?php
				$gir = get_field('girs'); ?>
				<?php
				if(in_array('hassa', $gir )){
				?>
				<h3>Fulfills HASS-A GIR</h3> <br />
				<?
				}
				if(in_array('hassh', $gir )){
				?>
				<h3>Fulfills HASS-H GIR</h3> <br />
				<?
				}
				if(in_array('hasss', $gir )){
				?>
				<h3>Fulfills HASS-S GIR</h3> <br />
				<?
					}
				if(in_array('rest', $gir )){
				?>
				<h3>Fulfills REST GIR</h3> <br />
				<?
						}
				if(in_array('lab', $gir )){
				?>
				<h3>Fulfills Laboratory GIR</h3> <br />
				<?
					}
				if(in_array('cih', $gir )){
				?>
				<h3>Fulfills CI-H GIR</h3> <br />
				<?
					}
				if(in_array('cihw', $gir )){
				?>
				<h3>Fulfills CI-HW GIR</h3> <br />
				<?
					}
				?>
									<br />						
								<?php
				$sdg = get_field('sustainable_development_goals'); ?>
				<div class="sustainable-development-goals-images">
				<?php
				if(in_array('sdg1', $sdg )){
				?>
				<a href="/sustainable-development-goals/"><img width="100" height="100" src="<?php echo get_template_directory_uri(); ?>/images/SDG1.png">
				<?
				}
				if(in_array('sdg2', $sdg )){
				?>
				<a href="/sustainable-development-goals/"><img width="100" height="100" src="<?php echo get_template_directory_uri(); ?>/images/SDG2.png">
				<?
				}
				if(in_array('sdg3', $sdg )){
				?>
				<a href="/sustainable-development-goals/"><img width="100" height="100" src="<?php echo get_template_directory_uri(); ?>/images/SDG3.png">
				<?
				}
				if(in_array('sdg4', $sdg )){
				?>
				<a href="/sustainable-development-goals/"><img width="100" height="100" src="<?php echo get_template_directory_uri(); ?>/images/SDG4.png">
				<?
				}
				if(in_array('sdg5', $sdg )){
				?>
				<a href="/sustainable-development-goals/"><img width="100" height="100" src="<?php echo get_template_directory_uri(); ?>/images/SDG5.png">
				<?
				}
				if(in_array('sdg6', $sdg )){
				?>
				<a href="/sustainable-development-goals/"><img width="100" height="100" src="<?php echo get_template_directory_uri(); ?>/images/SDG6.png">
				<?
				}
				if(in_array('sdg7', $sdg )){
				?>
				<a href="/sustainable-development-goals/"><img width="100" height="100" src="<?php echo get_template_directory_uri(); ?>/images/SDG7.png">
				<?
				}
				if(in_array('sdg8', $sdg )){
				?>
				<a href="/sustainable-development-goals/"><img width="100" height="100" src="<?php echo get_template_directory_uri(); ?>/images/SDG8.png">
				<?
				}
				if(in_array('sdg9', $sdg )){
				?>
				<a href="/sustainable-development-goals/"><img width="100" height="100" src="<?php echo get_template_directory_uri(); ?>/images/SDG9.png">
				<?
				}
				if(in_array('sdg10', $sdg )){
				?>
				<a href="/sustainable-development-goals/"><img width="100" height="100" src="<?php echo get_template_directory_uri(); ?>/images/SDG10.png">
				<?
				}
				if(in_array('sdg11', $sdg )){
				?>
				<a href="/sustainable-development-goals/"><img width="100" height="100" src="<?php echo get_template_directory_uri(); ?>/images/SDG11.png">
				<?
				}
				if(in_array('sdg12', $sdg )){
				?>
				<a href="/sustainable-development-goals/"><img width="100" height="100" src="<?php echo get_template_directory_uri(); ?>/images/SDG12.png">
				<?
				}
				if(in_array('sdg13', $sdg )){
				?>
				<a href="/sustainable-development-goals/"><img width="100" height="100" src="<?php echo get_template_directory_uri(); ?>/images/SDG13.png">
				<?
				}
				if(in_array('sdg14', $sdg )){
				?>
				<a href="/sustainable-development-goals/"><img width="100" height="100" src="<?php echo get_template_directory_uri(); ?>/images/SDG14.png">
				<?
				}
				if(in_array('sdg15', $sdg )){
				?>
				<a href="/sustainable-development-goals/"><img width="100" height="100" src="<?php echo get_template_directory_uri(); ?>/images/SDG15.png">
				<?
				}
				if(in_array('sdg16', $sdg )){
				?>
				<a href="/sustainable-development-goals/"><img width="100" height="100" src="<?php echo get_template_directory_uri(); ?>/images/SDG16.png">
				<?
				}
				if(in_array('sdg17', $sdg )){
				?>
				<a href="/sustainable-development-goals/"><img width="100" height="100" src="<?php echo get_template_directory_uri(); ?>/images/SDG17.png">
				<?
				}
				?>
					
								</div><!-- end of sustainable development goals images -->

					<br />
<h3><a href="/classes-search/">Return to full list of E&S Minor classes.</a></h3>					
								
							</div><!--End Main Content-->

							<?php if ( is_active_sidebar( 'right_sidebar_widgets' ) ) : ?>
							<div id="right_sidebar">
								<?php dynamic_sidebar( 'right_sidebar_widgets' ); ?>
							</div><!--End Right Sidebar-->
							<?php endif; ?>

							</div>

						</div><!--End Page Content-->

					</div><!--End Page Columns-->

				<?php endwhile; ?>

			<?php endif; ?>

			</div><!--End Page Wrapper-->

		</div><!--End Site Content-->

		<div id="site_footer">

			<?php

			//Get footer bar

			get_template_part('footerbar');

			?>

		</div><!--End Site Footer-->

	</div><!--End Site Wrapper-->

<?php

//Footer file

get_footer();

?>
