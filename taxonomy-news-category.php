<?php

get_header();

?>

	<div id="site_wrapper">

		<div id="site_content">

			<?php
			//Get top bar and fixed header
			get_template_part('topbar');
			?>

			<div id="page_wrapper">

					<div id="section_banner" style="background-image:url(/wp-content/uploads/2016/03/MENA-earth-at-night.jpg)">
						<div id="banner_heading">
							<h1>
								<?php
								$current_category = single_cat_title("", false);
								echo $current_category; ?>
							</h1>
						</div>
						<div id="banner_overlay">&nbsp;</div>
					</div>

					<div id="page_columns">

						<div id="page_content" class="clr">

									<div class="container clr">

							<?php
							if ( is_active_sidebar( 'right_sidebar_widgets' ) ) {
								$main_content_class = "has_sidebar";
							} else {
								$main_content_class = "no_sidebar";
							}

							?>

							<div id="main_content" class="<?php echo($main_content_class); ?> news-media-archive" role="main">


								<div class="post_formatting media_editor">
									
									<?php 
									$cat = get_queried_object();
									$term_id = $cat->term_id;
									$taxonomy = $cat->taxonomy;
									
									$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
									$args = array(
										'post_type'			=> 'news',
										'posts_per_page'	=> 12,
									    'cat' => $category_id,
										'paged'				=> $paged,
								        'tax_query' => array(
								            array(
								                'taxonomy' => $taxonomy,
								                'field' => 'term_id',
								                'terms' => $term_id,
								            )
								        )
										
									);
									$query = new WP_Query( $args ); 
									
									$count = 0;
									if ( have_posts() ) {
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
