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
					<div id="section_banner" style='background-image: url("/wp-content/uploads/2016/03/MENA-earth-at-night.jpg")'>
						<div id="banner_heading">
							<h1>
								<?php the_title(); ?>
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
									<?php if ( has_post_thumbnail() ) {
										the_post_thumbnail('medium');
										echo "<br><br>";
									} ?>
									<h2><?php the_title(); ?>, <?php the_field('people_title'); ?></h2>
									<?php the_content(); ?>
								</div>

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
