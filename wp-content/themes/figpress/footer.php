   </div> <?php // .wrapper ?>
  <footer>
    <?php if( is_active_sidebar('footer-top') ) { ?>
      <div class="footer-top-wrapper">
        <div class="footer-top container">
          <div class="row"><?php dynamic_sidebar( 'footer-top' ); ?></div>
        </div>
      </div>
    <?php } ?>
    <?php if( is_active_sidebar('footer-bottom') ) { ?>
      <div class="footer-bottom-wrapper">
        <div class="footer-bottom container">
          <div class="row"><?php dynamic_sidebar( 'footer-bottom' ); ?></div>
        </div>
      </div>
    <?php } ?>
	</footer>


  <?php if( get_field('fig_custom_js', 'option') ) { ?>
    <!-- Custom JS -->
    <script type="text/javascript"><?php the_field('fig_custom_js', 'option'); ?></script>
  <?php } ?>

	<?php wp_footer(); ?>
  <div class="modal-con"><div class="video-set-width"></div></div>
</body>
</html>
