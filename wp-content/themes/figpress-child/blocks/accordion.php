<?php if ( have_rows('accordion') ) { ?>
  <section id="accordion" class="accordion-wrap">
    <div class="outer-container">
        <?php while ( have_rows('accordion') ) { the_row();
          $accordion_title = get_sub_field('accordion_title');
          $accordion_content = get_sub_field('accordion_content');
          ?>
          <div class="accordion-tab">
            <?php if ( $accordion_title ) { ?>
              <div class="accordion-title"><?php echo $accordion_title ?></div>
            <?php } if ( $accordion_content ) { ?>
              <div class="accordion-content">
                <p class="accordion-content-text">
                  <?php echo $accordion_content ?>
                </p>
              </div>
            <?php } ?>
          </div>
        <?php } ?>
    </div>
  </section>
<?php } ?>
