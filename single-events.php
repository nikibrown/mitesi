<?php get_header(); ?>

	<div id="site_wrapper">

		<div id="site_content">

			<?php

            //Get top bar and fixed header

            get_template_part('topbar');

            ?>

			<div id="page_wrapper">

			<?php if (have_posts()): ?>

				<?php while (have_posts()): the_post() ?>
					<!-- <div id="section_banner"<?php if (has_post_thumbnail()) { ?> style="background-image: url(<?php the_post_thumbnail_url(); ?>)"<?php } ?>> -->
					<div id="section_banner" style='background-image: url("/wp-content/uploads/2016/03/MENA-earth-at-night.jpg")'>
						<div id="banner_heading">
							<h1>
								Events
							</h1>
						</div>
						<div id="banner_overlay">&nbsp;</div>
					</div>

					<div id="page_columns">

						<?php global $post; if (is_page() && $post->post_parent) {
                                    ?>
						<?php
                                } else {
                                    ?>
							<div class="secondary_navigation">
								<div class="container clr">
									<?php esi_display_secondary_navigation_menu(); ?>
								</div>
							</div>
						<?php
                                } ?>

						<div id="page_content" class="clr">

							<div class="container clr">

							<?php

                            //Sidebar display setting

                            if (is_active_sidebar('right_sidebar_widgets')) {
                                $main_content_class = "has_sidebar";
                            } else {
                                $main_content_class = "no_sidebar";
                            }

                            ?>

							<div id="main_content" class="<?php echo($main_content_class); ?>" role="main">

								<?php //edit_post_link('Edit Page', '<div class="admin_edit_link">', '</div>');?>

								<div class="post_formatting media_editor">
									<h2><?php the_title(); ?></h2>
									<p class="date-time">
										<span class="dates">
											JUNE 12, 2022 - JUNE 19, 2022
										</span>
										<span class="times">
											9:00AM - 5:00PM
										</span>
									</p>

									<details open class="section-accordion section-location">
										<summary class="section-title">Accordion section title</summary>
										<div class="section-inner">
											<p>Event main description the Environmental Solutions Initiative, in collaboration with the Vice-Minister of the Environment and Sustainable Development of Colombia, Nicolás Galarza Sánchez, and supported by MIT Latin American Office conducted a week-long fieldwork in Bogotá and Quibdó for the class “Biodiversity and Cities: a Perspective for Colombian Cities” co-instructed by Professor John Fernandez, Research Program Director Marcela Angel, Post-Doctoral Fellow Norhan Bayomi, and Doctorate Instructor Alessandra Fabbri.</p>
										</div>
									</details>

									<details class="section-accordion section-location">
										<summary class="section-title">Agenda section</summary>
										<div class="section-inner">
											<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, facilis. Vel, dignissimos. A sed perferendis eligendi provident, quidem libero suscipit, corporis, corrupti voluptate beatae impedit. Est, eos. Ratione, harum illo?</p>
											
											<h3>Optional Section Heading Tuesday November 11</h3>
											<table>
												<tr>
													<td>
														8:00AM
													</td>
													<td>Title of agenda item</td>
												</tr>
												<tr>
													<td>
														9:00AM
													</td>
													<td>Title of agenda item</td>
												</tr>
												<tr>
													<td>
														10:00AM
													</td>
													<td>Title of agenda item</td>
												</tr>
											</table>
										</div>
									</details>

									<details class="section-accordion section-location">
										<summary class="section-title">Sponsors</summary>
										<div class="section-inner">
											<p>Event main description the Environmental Solutions Initiative, in collaboration with the Vice-Minister of the Environment and Sustainable Development of <a href="">Colombia, Nicolás Galarza Sánchez</a>, and supported by MIT Latin American Office conducted a week-long fieldwork in Bogotá and Quibdó for the class “Biodiversity and Cities: a Perspective for Colombian Cities” co-instructed by Professor John Fernandez, Research Program Director Marcela Angel, Post-Doctoral Fellow Norhan Bayomi, and Doctorate Instructor Alessandra Fabbri.</p>
										</div>
									</details>

									
								</div>

                               
							</div><!--End Main Content-->

							<?php if (is_active_sidebar('right_sidebar_widgets')) : ?>
							<div id="right_sidebar">
								<?php dynamic_sidebar('right_sidebar_widgets'); ?>
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

			<?php get_template_part('footerbar');?>

		</div><!--End Site Footer-->

	</div><!--End Site Wrapper-->

<?php get_footer(); ?>
