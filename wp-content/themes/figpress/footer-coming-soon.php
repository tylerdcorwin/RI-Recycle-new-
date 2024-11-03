  <footer>
    <p>&copy; Copyright <?php echo get_bloginfo('name') ?>.</p>
	</footer>
  </div> <?php // .wrapper ?>

	<?php the_field('fig_analytics', 'option'); ?>

  <?php if( get_field('fig_custom_js', 'option') ) { ?>
    <!-- Custom JS -->
    <script type="text/javascript"><?php the_field('fig_custom_js', 'option'); ?></script>
  <?php } ?>

	<?php wp_footer(); ?>
</body>
</html>