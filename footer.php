<?php wp_footer(); ?>
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script src="https://unpkg.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/global.js?a"></script>
<script>
jQuery(function($) {
  $('a[href^="#"]').not('.nav--section a').on('click',function (e) {
    e.preventDefault();
    var target = this.hash;
    var $target = $(target);
    $('html, body').stop().animate({
        'scrollTop': $target.offset().top - 140
    }, 900, 'swing', function () {
        window.location.hash = target;
    });
	});
});

(function(window) {

  SlideCrossFade = {
    container: 'home-slides',
    displayTime: 4000,
    fadeTime: 1500,

    start: function() {
      var self = this;
      jQuery('#' + this.container + ' .slide.active').show();
      setInterval(function() { self.next(); }, this.displayTime);
    },

    next: function() {
      var $active = jQuery('#' + this.container + ' .active');
      var $next = ($active.next().length > 0) ? $active.next() : jQuery('#' + this.container + ' :first');
      $next.css('z-index', 2);

      $active.fadeOut(this.fadeTime, function() {
        $active.css('z-index', 1).show().removeClass('active');
        $next.css('z-index', 3).addClass('active');
      });
    },
	  
	      prev: function() {
      var $active = jQuery('#' + this.container + ' .active');
      var $prev = ($active. prev().length > 0) ? $active. prev() : jQuery('#' + this.container + ' :last');
      $prev.css('z-index', 2);

      $active.fadeOut(this.fadeTime, function() {
        $active.css('z-index', 1).show().removeClass('active');
        $prev.css('z-index', 3).addClass('active');
      });
    }
	  
  };

  window.SlideCrossFade = SlideCrossFade;

})(this);

jQuery(window).on('load',function() {
  SlideCrossFade.start();
});
	
jQuery('.slide-next').on('click',function() {
	SlideCrossFade.next();
});
jQuery('.slide-prev').on('click',function() {
	SlideCrossFade.prev();
});


</script>


<!-- MailChimp Popup -->
<!-- https://kb.mailchimp.com/lists/signup-forms/add-a-pop-up-signup-form-to-your-website -->
<script type="text/javascript" src="//downloads.mailchimp.com/js/signup-forms/popup/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script><script type="text/javascript">require(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us11.list-manage.com","uuid":"7247cc773946fb96a52ecfa04","lid":"e72bab4498"}) })</script>

</body>
</html>
