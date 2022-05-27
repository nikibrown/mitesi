<?php get_header(); ?>

	<div id="site_wrapper">

		<div id="site_content">
			<?php get_template_part('topbar'); ?>
		</div>

<link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
<div id="carousel" class="carousel slide" data-ride="carousel" interval="4000">
  <div class="carousel-inner">
	  <?php
			$settings = new WP_Query();
			$settings->query(array(
				'post_type' => 'site-settings',
				'order' => 'ASC',
				'posts_per_page' => 1
			));
		?>
		<?php if($settings->have_posts()) : ?>
			<?php while($settings->have_posts()): $settings->the_post(); ?>
			<?php
				if( have_rows('homepage_slideshow') ): 
	  				$count = 0; 
	  				$carouselindicators = '';
	  			while ( have_rows('homepage_slideshow') ) : the_row(); ?>
				<?php
				$section_banner = get_sub_field('homepage_slideshow_image');
				$section_caption = get_sub_field('caption');
				$section_banner_desktop_url = $section_banner['sizes']['slide-desktop'];
	  $activeclass = '';
	  if ($count<1) { $activeclass = 'active'; }
	  	$carouselindicators .= '<li data-target="#carousel" data-slide-to="'.$count.'" class="'.$activeclass.'"></li>';
			?>
			<div class="carousel-item<?php if ($count<1) { ?> active<?php } ?>" style="background-image:url(<?php echo($section_banner_desktop_url); ?>);">
				<div class="caption">
					<?php echo $section_caption; ?>
				</div>
				<img src="<?php echo($section_banner_desktop_url); ?>">
			</div>
			<?php $count++; endwhile; endif;?>
			<?php endwhile; ?>
		<?php endif; ?> 
	    <ol class="carousel-indicators">
    		<?php echo $carouselindicators; ?>
		</ol>
  </div>
  <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
		
		<?php
			$settings = new WP_Query();
			$settings->query(array(
				'post_type' => 'site-settings',
				'order' => 'ASC',
				'posts_per_page' => 1
			));
			?>
			<?php if($settings->have_posts()) : ?>
				<?php while($settings->have_posts()): $settings->the_post(); ?>
					<?php if( have_rows('callout_buttons') ): ?>
						<div class="callout">
						  <div class="container clr">
								<?php if(get_field('callout_heading')) { echo '<h2>' . get_field('callout_heading') . '</h2>'; } ?>
								<?php while ( have_rows('callout_buttons') ) : the_row(); ?>
									<a href="<?php the_sub_field('callout_button_link'); ?>" class="btn btn-outline" target="_blank"><?php the_sub_field('callout_button_text'); ?></a>
								<?php endwhile; ?>
							</div>
						</div>
					<?php endif;?>
				<?php endwhile; ?>
			<?php endif; ?>
		

			<div id="content" class="card-container">
			  <div class="container clr">
			    <div class="cards">
			      <div class="card-sizer"></div>
						<?php
						$settings = new WP_Query();
						$settings->query(array(
							'post_type' => 'site-settings',
							'order' => 'ASC',
							'posts_per_page' => 1
						));
						?>
						<?php if($settings->have_posts()) : ?>
							<?php while($settings->have_posts()): $settings->the_post(); ?>
								<?php if( have_rows('homepage_cards') ): ?>
									<?php while ( have_rows('homepage_cards') ) : the_row(); ?>
										<div class="card card-width-<?php the_sub_field('card_width'); ?>" style="height: <?php the_sub_field('card_height'); ?>px !important;">
										<div class="inner" style="height: <?php the_sub_field('card_height'); ?>px !important;">
											<?php the_sub_field('card_content'); ?>
											</div>
										</div>
									<?php endwhile; ?>
								<?php endif;?>
							<?php endwhile; ?>
						<?php endif; ?>
				

	<div class="card card-width-one" style="height: 510px !important;">
		<div class="inner" style="height: 510px !important;">	
					<?php
					$args = array(
					    'post_type' => 'news',
					    'posts_per_page' => 1,
						'post_status' => 'publish'
					);
					$recent_news = new WP_Query($args);
					if($recent_news->have_posts()):
						while ( $recent_news->have_posts() ) :
					    $recent_news->the_post();
						if(get_field('external_link')):
							$url = get_field('external_link');
						else:
							$url = get_the_permalink();
						endif;
					    echo '<h3><a href="/news-media/"><strong>News:</strong></a></h3>
						&nbsp;
						'.get_the_post_thumbnail().'
						<p class="p1"><br/><a href="' . $url . '" target="_blank" rel="noopener">' . get_the_title() . '</a>.</p><p>'.get_the_excerpt().'</p>
						<p class="text-right"><a class="btn btn-sm btn-text" href="/news-media/">More News →</a></p>';
			endwhile;
				endif;
					?>
			</div>
		</div>
						
			    </div>
			  </div>
			</div><!--End Card Container-->

			

		</div><!--End Site Content-->

		<div id="site_footer">
			<?php get_template_part('footerbar'); ?>
		</div><!--End Site Footer-->
	</div><!--End Site Wrapper-->

<?php get_footer(); ?>
