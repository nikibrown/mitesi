<div id="prefooter">
	<div class="container clr">
		<?php esi_display_secondary_navigation_menu(); ?>
	</div>
</div>

<div id="footer">

	<?php $contact_info = esi_get_contact_info(); ?>

	<div class="container clr">

		<div class="footer_column contact_column">
			<?php echo do_shortcode('[contactvalue value="address"]'); ?>
		</div>

		<div class="footer_column newsletter_column">
			<p>
        <strong>Get the latest on ESI news and events, plus our weekly newsletter:</strong>
      </p>
			<div id="mc_embed_signup">
		    <form action="//mit.us11.list-manage.com/subscribe/post?u=7247cc773946fb96a52ecfa04&amp;id=e72bab4498" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
		      <div id="mc_embed_signup_scroll">
		        <div class="mc-field-group">
		          <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email address"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button btn btn-light">
		        </div>
		        <div id="mce-responses" class="clear">
		          <div class="response" id="mce-error-response" style="display:none"></div>
		          <div class="response" id="mce-success-response" style="display:none"></div>
		        </div>
		        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_7247cc773946fb96a52ecfa04_e72bab4498" tabindex="-1" value=""></div>
		      </div>
		    </form>
		  </div>
		</div>

		<div class="footer_column social_column">

			<?php if ( ($contact_info["facebook_url"]) || ($contact_info["twitter_url"]) || ($contact_info["youtube_url"]) ) : ?>

				<div class="social_icons contact_divider clr">
					<?php if ($contact_info["youtube_url"]) : ?>
						<a target="_blank" href="<?php echo($contact_info["youtube_url"]); ?>" class="youtube_icon">
							<i class="fa fa-youtube-play" aria-hidden="true"></i>
						</a>
					<?php endif; ?>
					<?php if ($contact_info["twitter_url"]) : ?>
						<a target="_blank" href="<?php echo($contact_info["twitter_url"]); ?>" class="twitter_icon">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					<?php endif; ?>
					<?php if ($contact_info["facebook_url"]) : ?>
						<a target="_blank" href="<?php echo($contact_info["facebook_url"]); ?>" class="facebook_icon">
							<i class="fa fa-facebook" aria-hidden="true"></i>
						</a>
					<?php endif; ?>
				</div>

			<?php endif; ?>

		</div>

	</div>

</div>
