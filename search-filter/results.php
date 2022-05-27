<?php
/**
 * Search & Filter Pro 
 *
 * Sample Results Template
 * 
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      https://searchandfilter.com
 * @copyright 2018 Search & Filter
 * 
 * Note: these templates are not full page templates, rather 
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think 
 * of it as a template part
 * 
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs 
 * and using template tags - 
 * 
 * http://codex.wordpress.org/Template_Tags
 *
 */

if ( $query->have_posts() )
{
	?>
	
	<strong><?php echo $query->found_posts; ?> Results:</strong> Showing Page <?php echo $query->query['paged']; ?> of <?php echo $query->max_num_pages; ?><br />

<br />
<hr />
<br />
	
	
	<?php
	while ($query->have_posts())
	{
		$query->the_post();
		
		?>
		<div>
			<h4><a href="<?php the_permalink(); ?>"><?php the_field('subject_number'); ?> <?php the_title(); ?></a></h4>
			<?php 
				if ( has_post_thumbnail() ) {
					echo '<p>';
					the_post_thumbnail("small");
					echo '</p>';
				}
			?>
			
			<p><?php the_category(); ?></p>
			<p><?php the_tags(); ?></p>
			
		</div>
		
		<br />
		<?php
	}
	?>
<hr />
<br />
	<strong>Showing Page <?php echo $query->query['paged']; ?> of <?php echo $query->max_num_pages; ?></strong><br />
<br />
	<div class="pagination">
		
		<div class="nav-previous"><?php next_posts_link( 'Next page', $query->max_num_pages ); ?></div>
		<div class="nav-next"><?php previous_posts_link( 'Previous page' ); ?></div>
		<?php
			/* example code for using the wp_pagenavi plugin */
			if (function_exists('wp_pagenavi'))
			{
				echo "<br />";
				wp_pagenavi( array( 'query' => $query ) );
			}
		?>
	</div>
	<?php
}
else
{
	echo "No Results Found";
}
?>