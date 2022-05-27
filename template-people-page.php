<?php
/*
 * Template Name: People Template
 */

get_header();
?>

<div id="site_wrapper">

<div id="site_content">

<?php
//Get top bar and fixed header
get_template_part('topbar');
?>

<div id="page_wrapper">
	<div id="section_banner"<?php if (has_post_thumbnail()) { ?> style="background-image: url(<?php the_post_thumbnail_url(); ?>)"<?php } ?>>
		<div id="banner_heading">
			<h1> <?php the_title(); ?> </h1>
		</div>
		<div id="banner_overlay">&nbsp;</div>
	</div>

	<div id="page_columns">

	<?php global $post; if (is_page() && $post->post_parent) { ?>

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
			if (is_active_sidebar('right_sidebar_widgets')) {
				$main_content_class = "has_sidebar";
			} else {
				$main_content_class = "no_sidebar";
			}
		?>

		<div id="main_content" class="<?php echo($main_content_class); ?>" role="main">

		<!-- <?php edit_post_link('Edit Page', '<div class="admin_edit_link">', '</div>'); ?><br /><br /> -->

			<div class="post_formatting media_editor">
				<?php
				if (isset($_GET['people'])) {
					$get_meta_value = $_GET['people']; // esiteam, affiliatedfaculty, advisorycouncil, esi-affiliates, etc.
					$meta_value = sanitize_text_field($get_meta_value); // https://developer.wordpress.org/reference/functions/sanitize_text_field/
				}
				?>

				<?php
				switch ($meta_value) {
					case "esiteam":
						echo "<h2>ESI Team</h2>";
						break;
					case "affiliatedfaculty":
						echo "<h2>Affiliated Faculty</h2>";
						break;
					case "advisorycouncil":
						echo "<h2>Student Advisory Council</h2>";
						break;
					case "esiaffiliates":
						echo "<h2>ESI Affiliates</h2>";
						break;
					case "externaladvisoryboard":
						echo "<h2>External Advisory Board</h2>";
						break;
                    case "facultyadvisorycouncil":
                        echo "<h2>Faculty Advisory Council</h2>";
                        break;
					default:

					$meta_value = 'no-match'; // Set $meta_value to 'no-match' so there won't be any get_posts results.

				}	?>

			<?php
			if ( $meta_value !== 'no-match'  ) {

            if ($meta_value === 'affiliatedfaculty' || $meta_value === 'facultyadvisorycouncil') {

                $last_name = get_field('last_name');

                $args = array(
                    'post_type' => 'mitesi_people',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'meta_key' => 'last_name',
                    'meta_value' => $last_name,
                    /*'meta_query' => array(
                        array( 'key'=>'people_category','compare' => 'EXISTS', 'value' => $meta_value ),
                    ),*/ // remove for multiselect category.
                    'orderby' => 'last_name title', 'order' => 'ASC',
                );

            } else {

                $args = array(
                    'posts_per_page' => -1,
                    'post_type' => 'mitesi_people',
                    'order' => 'ASC',
                    'orderby' => 'menu_order',
                    /*'meta_key' => 'people_category',
                    'meta_value' => $meta_value */ // remove for multiselect category.
                );

            }

            $results = new WP_Query($args);
            ?>
                <ul class="the_people">
                    <?php
                    if( $results->have_posts() ) :
                    while( $results->have_posts() ) :
                    $results->the_post();
                    $people_category = get_post_meta(get_the_ID(),'people_category',true); if(!is_array($people_category)) {
	$people_category = array($people_category);
}
				//add for multiselect category.
                        if (in_array($meta_value, $people_category) || $meta_value == $people_category) { //add for multiselect category. check if multi select or single select also.
                        ?>
                    <li class="<?php echo $meta_value; ?>">
                        <?php
                        if ($meta_value != 'advisorycouncil' && $meta_value != 'externaladvisoryboard') {
                            echo "<a href='" . get_the_permalink() . "'>";
                            if (get_field('people_preview_image')) {
                                echo "<img src='" . get_field('people_preview_image') . "'>";
                            } elseif (has_post_thumbnail() && $meta_value == 'affiliatedfaculty') {
                                the_post_thumbnail('thumbnail');
                            } elseif (has_post_thumbnail()) {
                                the_post_thumbnail('270x270');
                            } else {
                                echo '<img src="https://dummyimage.com/270x270&text=Coming+Soon">';
                            }
                            echo "</a>";
                        }

                        if ($meta_value == 'advisorycouncil' || $meta_value == 'externaladvisoryboard') {

                            echo "<strong>" . get_the_title() . "</strong> <i>" . get_field('people_title') . "</i><div class='content'>" . get_the_content() . "</div>";

                        } else {

                            $people_title = get_field('people_title');

                            if (strlen($people_title) > 35) {
                                $people_title = substr($people_title, 0, 35) . '...';
                            }

                            ?>
                            <a class="people_title" href="<?php the_permalink(); ?>"><?php the_title(); ?><br/>
                                <!-- <?php echo $people_title; ?> --></a>

                        <?php } ?>
                    </li>
                    <?php
                      //die(); //add for multiselect category.
                      } //add for multiselect category.
				      endwhile;

				      wp_reset_postdata();

				endif;
				?>
				</ul>

				<?php } ?>

			</div>

			<!-- Start people_section_blocks -->
			<section class="people_section_blocks">
				<?php setup_postdata($post); ?>
				<h2>Browse Our People</h2>
				<?php the_content(); ?>
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
