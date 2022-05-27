<?php

//Header file

get_header();

?>

			<div id="page_wrapper">

				<div id="page_columns" class="container clr">

					<div id="left_sidebar">
						&nbsp;
					</div><!--End Left Sidebar-->

					<div id="page_content" class="clr">

						<div id="main_content" role="main">

							<?php if (have_posts()): ?>

								<?php while(have_posts()): the_post() ?>

									<div class="post_formatting media_editor">
										<h2><?php the_title(); ?></h2>
										<?php the_content(); ?>
									</div>

								<?php endwhile; ?>

							<?php endif; ?>

						</div><!--End Main Content-->

					</div><!--End Page Content-->

				</div><!--End Page Columns-->

			</div><!--End Page Wrapper-->

<?php

//Footer file

get_footer();

?>
