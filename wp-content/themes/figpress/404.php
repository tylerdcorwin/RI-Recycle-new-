<?php get_header(); ?>

<?php
  $blog_hero = get_field('fig_default_blog_image', 'option');
?>

<section class="small-hero" style="background-image: url(<?php echo $blog_hero ?>)">
  <div class="outer-container">
    <h1 class="page-title">404</h1>
  </div>
</section>

  <section class="four-oh-four">
    <div class="outer-container">
      <h2>Oops, something's missing here</h2>
      <p>We can't seem to find the page you're looking for. Make sure you typed in the page address correctly or go back to your previous page.</p>
      <div class="four-oh-four-search-con">
        <p>Try something else:</p>
        <?php get_search_form(); ?>
      </div>
      <a href="<?php echo site_url(); ?>">Take me home</a>
    </div>
  </section>

<?php get_footer(); ?>
