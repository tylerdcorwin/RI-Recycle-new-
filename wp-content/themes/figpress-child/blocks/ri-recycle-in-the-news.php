<?php
  $title = get_field('ri_recycle_news_title');
?>

<section class="recycle-news-wrap" data-aos="fade-up">
  <div class="outer-container">
    <?php if ( $title ) { ?>
      <h2><?php echo $title; ?></h2>
    <?php } ?>
    <?php if ( have_rows('ri_recycle_news_stories') ) { ?>
      <div class="recycle-news-con">
        <?php while ( have_rows('ri_recycle_news_stories') ) { the_row();
          $img = get_sub_field('ri_recycle_news_image');
          $article_title = get_sub_field('ri_recycle_news_article_title');
          $desc = get_sub_field('ri_recycle_news_article_description');
          $link = get_sub_field('ri_recycle_news_article_link');
          ?>
          <a href="<?php echo $link['url']; ?>" class="indiv-news-article">
            <?php if ( $img ) { ?>
              <div class="news-img" style="background-image: url('<?php echo $img['url']; ?>')"></div>
            <?php } ?>
            <?php if ( $article_title ) { ?>
              <h5><?php echo $article_title; ?></h5>
            <?php } ?>
            <?php if ( $desc ) { ?>
              <p><?php echo $desc; ?></p>
            <?php } ?>
            <span class="link-label"><?php echo $link['title']; ?></span>
          </a>
        <?php } ?>
      </div>
    <?php } ?>
  </div>
</section>
