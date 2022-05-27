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

					<div id="section_banner" style="background-image: url(https://environmentalsolutions.mit.edu/wp-content/uploads/2017/08/Shutterstock_crowded-city-street-rendered.jpg)">

						<div id="banner_heading">
							<h1>
								Page Not Found
							</h1>
						</div>
						<div id="banner_overlay">&nbsp;</div>
					</div>

					<div id="page_columns">

						<div id="page_content" class="clr">

							<div class="container clr">


							<div id="main_content" class="no_sidebar" role="main">


								<div class="post_formatting media_editor">
									<br /><br />
									<h2>Sorry Page Not Found. Please return to the <a href="https://environmentalsolutions.mit.edu/">home page</a>.</h2>
								</div>

							</div><!--End Main Content-->


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
