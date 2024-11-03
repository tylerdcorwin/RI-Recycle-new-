</div> <?php // .wrapper ?>
  <?php
  $company_name = get_field('fig_contact_company_name', 'option');
  $address = get_field('fig_contact_address', 'option');
  $phone = get_field('fig_contact_phone', 'option');
  $fax = get_field('fig_contact_fax', 'option');
  $email = get_field('fig_contact_email', 'option');
  $logo = get_field('fig_footer_logo', 'option');
  ?>
  <footer class="footer-con">
    <div class="outer-container">
      <div class="footer-top-con">
        <div class="footer-logo-con">
          <?php if ( get_field('fig_footer_logo', 'option') ) { ?>
            <a href="<?php echo site_url(); ?>" class="footer-logo">
              <?php $logo    = get_field('fig_footer_logo', 'option');
                    $logoUrl = $logo['url'];
                    $logoAlt = $logo['alt']; ?>
              <img class="footer-logo-img" src="<?php echo $logoUrl; ?>" alt="<?php echo $logoAlt; ?>">
            </a>
          <?php } ?>
        </div>
        <div class="footer-search-bar">
          <?php get_search_form(); ?>
          <img src="<?php echo THEME_IMG_PATH; ?>/search.svg" alt="search icon" />
        </div>
      </div>
      <div class="footer-middle-con">
        <?php if( is_active_sidebar('footer-top') ) { ?>
          <div class="footer-middle-wrapper">
            <?php dynamic_sidebar( 'footer-top' ); ?>
          </div>
        <?php } ?>
      </div>
      <div class="footer-bottom container">
          <div class="copyright">© <?php echo date('Y'); ?> <?php echo $company_name; ?>. All Rights Reserved.</div>
        <?php if( is_active_sidebar('footer-bottom') ) { ?>
          <div class="row"><?php dynamic_sidebar( 'footer-bottom' ); ?></div>
        <?php } ?>
      </div>
    </div>
  </footer>

  <div class="modal-con">
    <div class="modal-content">
      <div class="close-modal"></div>
      <div class="lightbox" style="background-image: url('')"></div>
      <div class="embed-container"></div>
    </div>
  </div>

  <?php if( get_field('fig_custom_js', 'option') ) { ?>
    <!-- Custom JS -->
    <script type="text/javascript"><?php the_field('fig_custom_js', 'option'); ?></script>
  <?php } ?>

  <?php wp_footer(); ?>
</body>
</html>
