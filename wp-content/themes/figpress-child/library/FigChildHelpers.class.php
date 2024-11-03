<?php

  class FigChildHelpers {

    public static function get_links($links, $css_class = '') {
      // Don't print any markup if there are no items at this point.
      if (empty($links) || !is_array($links)) {
        echo 'ok';
        return;
      }

      $l = $links;
      // Buffer starts
      ob_start(); ?>
      <?php
      $email = '';
      $subject = '';
      if ( $l['mailto_link'] ) {
        $email = $l['mailto_link'][0]['email'];
        $subject = $l['mailto_link'][0]['subject'];
      }
      $options = [
        'external_link' => $l['external_link'],
        'internal_page' => $l['internal_page'],
        'upload_file' => $l['upload_file'],
        'mailto' => 'mailto:' . $email . '?subject=' . $subject,
        'target' => $l['type'] === 'external_link' || $l['type'] === 'upload_file' ? ' target="_blank"' : null,
        'label' => !empty($l['label']) ? '' . $l['label'] . '</span>' : null,
        'class' => !empty($css_class) ? "class=\"${css_class}\"" : null,
      ];
      ?>

      <a <?php echo $options['class']; ?> href="<?php echo esc_url($options[ $l['type'] ]); ?>"
        <?php echo esc_html($options['target']); ?>><?php echo $options['label']; ?></a>

      <?php
      $allowed_html = [
        'a' => [
          'href' => true,
          'rel' => true,
          'name' => true,
          'target' => true,
          'class' => true,
          'id' => true,
          'title' => true,
        ],
      ];

      $result = ob_get_clean();

      echo wp_kses($result, $allowed_html);
    }

    // check to see if block exists and return excerpt -- can be edited in future for more specifics
    public static function checkForBlock($post_block, $block_name) {
      $blocks = parse_blocks( $post_block );
      if( !empty($blocks) && $blocks[0]['blockName'] === $block_name ) {
        $wysiwyg_acf = $blocks[0]['attrs']['data']['content_area'];
        $content = apply_filters('the_content', $wysiwyg_acf);
        $content_for_excerpt = strip_tags($content);
      }
      else {
        $content_for_excerpt = get_the_excerpt();
      }
      return $content_for_excerpt;
    }

    // link with no label, don't forget to close the anchor tag!!!
    public static function get_link_no_title($links, $css_class = '') {
      // Don't print any markup if there are no items at this point.
      if (empty($links) || !is_array($links)) {
        echo 'ok';
        return;
      }

      $l = current($links);
      // Buffer starts
      ob_start(); ?>
      <?php
      $options = [
        'external_link' => $l['external_link'],
        'internal_page' => $l['internal_page'],
        'upload_file' => $l['upload_file'],
        'mailto' => 'mailto:' . $l['mailto_link'][0]['email'] . '?subject=' . $l['mailto_link'][0]['subject'],
        'target' => $l['type'] === 'external_link' || $l['type'] === 'upload_file' ? ' target="_blank"' : null,
        'class' => !empty($css_class) ? "class=\"${css_class}\"" : null,
      ];
      ?>

      <a <?php echo $options['class']; ?> href="<?php echo esc_url($options[ $l['type'] ]); ?>"
        <?php echo esc_html($options['target']); ?>>

      <?php
      $allowed_html = [
        'a' => [
          'href' => true,
          'rel' => true,
          'name' => true,
          'target' => true,
          'class' => true,
          'id' => true,
          'title' => true,
        ],
      ];

      $result = ob_get_clean();

      echo wp_kses($result, $allowed_html);
    }

  }
?>
