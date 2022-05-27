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

				<?php while (have_posts()): the_post() ?>
					<!-- <div id="section_banner"<?php if (has_post_thumbnail()) { ?> style="background-image: url(<?php the_post_thumbnail_url(); ?>)"<?php } ?>> -->
					<div id="section_banner" style='background-image: url("/wp-content/uploads/2016/03/MENA-earth-at-night.jpg")'>
						<div id="banner_heading">
							<h1>
								<?php
                                $new_title = get_the_title();
                                if (strlen($new_title) > 20):
                                    $short_new_title = substr($new_title, 0, 20) . '...';
                                    echo $short_new_title;
                                else:
                                    the_title();
                                endif; ?>
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
									<?php if ($short_new_title) {
                                echo '<h2>' . get_the_title() . '</h2>';
                            } ?>
									<?php the_content(); ?>
								</div>

                                <!-- Start people_section_blocks , same as template-people-page client CR-->
                                <section class="people_section_blocks">
                                    <?php setup_postdata($post); ?>
                                    <h2>Browse Our People</h2>
                                    <p><?php echo get_post_field('post_content','2314'); ?></p>
                                    <div style="text-align: center;">
                                        <a href="/about/people/?people=esiteam"><img src="<?php echo get_template_directory_uri(); ?>/images/ESI_team.jpg"><span>ESI Team</span></a>
                                        <a href="/about/people/?people=externaladvisoryboard"><img src="<?php echo get_template_directory_uri(); ?>/images/ESI_advisory_board.jpg"><span>External Advisory Board </span></a>
                                        <a href="/about/people/?people=affiliatedfaculty"><img src="https://environmentalsolutions.mit.edu/wp-content/uploads/2017/11/affiliatedfaculty.jpg"><span>Affiliated Faculty</span></a>
                                        <a href="/about/people/?people=advisorycouncil"><img src="https://environmentalsolutions.mit.edu/wp-content/uploads/2017/11/advisorycouncil.jpg"><span>Student Advisory Council</span></a>
                                        <a href="/visiting-scholar/"><img src="<?php echo get_template_directory_uri(); ?>/images/ESI_Affiliates.jpg"><span>ESI Affiliates</span></a>
                                        <a href="/about/people/?people=facultyadvisorycouncil"><img src="<?php echo get_template_directory_uri(); ?>/images/ESI_people_FAC.jpg"><span>Faculty Advisory Council</span></a>
                                    </div>
                                </section>
                                <!-- End people_section_blocks -->
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
