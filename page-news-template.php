<?php

/* Template name: News & Media Page */

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
					<div id="section_banner"<?php if ( has_post_thumbnail() ) { ?> style="background-image: url(<?php the_post_thumbnail_url(); ?>)"<?php } ?>>
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

								<?php
				   // Use ACF Custom field to add "wide" class
								 if ( get_field( "mit_is_wide_page" ) ) { ?>
									 <div class="container clr widepage">
								<?php } else { ?>
									<div class="container clr">
								<?php } ?>


							<?php

							//Sidebar display setting

							if ( is_active_sidebar( 'right_sidebar_widgets' ) ) {
								$main_content_class = "has_sidebar";
							} else {
								$main_content_class = "no_sidebar";
							}

							?>

							<div id="main_content" class="<?php echo($main_content_class); ?> news-media-archive" role="main">

								<?php edit_post_link('Edit Page', '<div class="admin_edit_link">', '</div>'); ?>

								<div class="post_formatting media_editor">
									<?php the_content(); ?>
									
									<?php 
									$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
									$args = array(
										'post_type'			=> 'news',
										'posts_per_page'	=> 12,
										'paged'				=> $paged
									);
									$query = new WP_Query( $args ); 
									
						            // Pagination fix
						            // $temp_query = $wp_query;
         // 						            $wp_query   = NULL;
         // 						            $wp_query   = $query;
									
									$count = 0;
									if ( $query->have_posts() ) {
										while ( $query->have_posts() ) {
											$query->the_post();
											$post_link = (get_field('external_link') ? get_field('external_link') : get_the_permalink());
											$post_link_target = (get_field('external_link') ? '_blank' : '_self');
											 ?>
											 <div class="content-column one_half" style="font-size: 15px;">
												 <a href="<?php echo $post_link; ?>" target="<?php echo $post_link_target;?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'post-grid-thumbnail');?>"></a><br />									 
												 <?php echo get_the_date(); ?><br />
											<a href="<?php echo $post_link; ?>" target="<?php echo $post_link_target;?>">
												<strong><?php echo get_the_title(); ?></strong>
												</a>
											<p>
											<?php echo get_the_excerpt(); ?></p>
										</div>
										<?php 
										$count++;
										if(($count % 2) == 0) {
											echo '<div style="width:100%;clear:both;height:10px;"></div>';
										}
										} // end while

									$total_pages = $query->max_num_pages;

									if ($total_pages > 1){

										$current_page = max(1, get_query_var('paged'));

										echo paginate_links(array(
											'base' => get_pagenum_link(1) . '%_%',
											'format' => '/page/%#%',
											'current' => $current_page,
											'total' => $total_pages,
											'prev_text'    => __('« prev'),
											'next_text'    => __('next »'),
										));
									}    
									wp_reset_postdata();
									
								} // end if
									
								wp_reset_query();
							?>
									
								</div>

							</div><!--End Main Content-->

							<?php if ( is_active_sidebar( 'right_sidebar_widgets' ) ) : ?>
							<div id="right_sidebar" class="news-and-media-sidebar">
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
