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


								<div class="post_formatting media_editor">
									<h2><?php the_title(); ?></h2>
									<div class="section-intro">
										<p class="date-time">
											<span class="dates">
												<?php the_field("event_date"); ?>
											</span>
											<span class="times">
												<?php the_field("event_time"); ?>
											</span>
										</p>
										<?php the_field("event_intro_text"); ?>
									</div><!--./section-intro-->

									<?php if( have_rows('event_sections') ): ?>
										<?php while( have_rows('event_sections') ): the_row(); ?>
											<?php if( get_row_layout() == 'generic_section' ): ?>
												<details 
												<?php if( get_sub_field('open_accordion') ) { ?>open <?php } ?>
												class="section-accordion section-generic">
													<summary class="section-accordion-title">
														<span><?php the_sub_field("section_headline"); ?></span>
													</summary>
													<div class="section-inner">
														<?php the_sub_field("generic_section_content"); ?>
													</div>
												</details><!--./section-generic-->
											<?php elseif( get_row_layout() == 'sponsors_section' ): ?>
												<details 
													<?php if( get_sub_field('open_accordion') ) { ?>open <?php } ?>
													class="section-accordion section-sponsors">
													<summary class="section-accordion-title">
														<span><?php the_sub_field("section_headline"); ?></span>
													</summary>
													<div class="section-inner">
														<?php the_sub_field("section_intro"); ?>

														<?php if( have_rows('sponsors') ): ?>
															<?php while( have_rows('sponsors') ): the_row(); 
																$sponsor_logo = get_sub_field('sponsor_logo'); ?>
																<div class="sponsor">
																	<div class="sponsor-img">
																		<a href="<?php the_sub_field("sponsor_link"); ?>" target="blank">
																			<img src="<?php echo $sponsor_logo; ?>" alt="<?php the_sub_field("sponsor_name"); ?>" />
																		</a>
																	</div>
																
																	<div class="sponsor-desc">
																		<h5>
																			<a href="<?php the_sub_field("sponsor_link"); ?>" target="blank">
																				<?php the_sub_field("sponsor_name"); ?>
																			</a>
																		</h5>
																		<?php the_sub_field("sponsor_description"); ?>
																	</div>
																</div><!--/.sponsor-->
															<?php endwhile; ?>
														<?php endif; ?>
													</div>
												</details><!--./section-sponsors-->
											
											<?php elseif( get_row_layout() == 'agenda_section' ): ?>
												<details	 
												<?php if( get_sub_field('open_accordion') ) { ?>open <?php } ?>
												class="section-accordion section-agenda">
													<summary class="section-accordion-title"><span><?php the_sub_field("section_headline"); ?></span></summary>
													<div class="section-inner">
														<?php the_sub_field("section_intro"); ?>
														<?php if( have_rows('agenda_item') ): ?>
															<?php while( have_rows('agenda_item') ): the_row(); ?>
																<div class="agenda">
																	<h3 class="table-header"><?php the_sub_field("agenda_heading"); ?></h3>
																	<table>
																		<colgroup>
																			<col width="20%">
																			<col width="80%">
																		</colgroup>
																		<?php if( have_rows('agenda_item_row') ): ?>
																			<?php while( have_rows('agenda_item_row') ): the_row(); ?>
																				<tr>
																					<td class="time">
																						<?php the_sub_field("agenda_time_slot"); ?>
																					</td>
																					<td>
																						<?php the_sub_field("agenda_item_text"); ?>
																					</td>
																				</tr>
																			<?php endwhile; ?>
																		<?php endif; ?>
																	</table>
																</div>
															<?php endwhile; ?>
														<?php endif; ?>
													</div>
												</details><!--./section-agenda -->

											<?php elseif( get_row_layout() == 'speakers_section' ): ?>
												<details
												<?php if( get_sub_field('open_accordion') ) { ?>open <?php } ?>
												class="section-accordion section-speakers">
													<summary class="section-accordion-title">
														<span><?php the_sub_field("section_headline"); ?></span>
													</summary>
													<div class="section-inner">
														<?php the_sub_field("section_intro"); ?>
														
														<?php if( have_rows('speaker') ): ?>
															<?php while( have_rows('speaker') ): the_row(); 
																$speaker_headshot= get_sub_field('speaker_headshot');
															?>
																<div class="speaker">
																	<div class="speaker-img">																		
																		<img src="<?php echo $speaker_headshot; ?>" alt="<?php the_sub_field("speaker_name"); ?>" />
																		<ul class="social">
																			<?php if( get_sub_field('linkedin_url') ): ?>
																				<li>
																					<a href="<?php the_sub_field('linkedin_url'); ?>" target="blank">
																						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/linkedin.png" alt="Follow  <?php the_sub_field("speaker_name"); ?> on Linkedin">
																					</a>
																				</li>
																			<?php endif; ?>
																			<?php if( get_sub_field('twitter_url') ): ?>
																				<li>
																					<a href="<?php the_sub_field('twitter_url'); ?>" target="blank">
																						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/twitter.png" alt="Follow  <?php the_sub_field("speaker_name"); ?> on Twitter">
																					</a>
																				</li>
																			<?php endif; ?>
																			<?php if( get_sub_field('facebook_url') ): ?>
																				<li>
																					<a href="<?php the_sub_field('facebook_url'); ?>" target="blank">
																						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/facebook.png" alt="Follow  <?php the_sub_field("speaker_name"); ?> on Facebook">
																					</a>
																				</li>
																			<?php endif; ?>
																		</ul>
																	</div>
																
																	<div class="speaker-desc">
																		<h5><?php the_sub_field("speaker_name"); ?></h5>
																		<?php the_sub_field("speaker_credentials"); ?>
																		<?php the_sub_field("speaker_bio"); ?>
																	</div>
																</div>
															<?php endwhile; ?>
														<?php endif; ?>
													</div>
												</details>
											<?php endif; ?>
											
										<?php endwhile; ?>
									<?php endif; ?>

								</div><!--/post_formatting -->
								
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
