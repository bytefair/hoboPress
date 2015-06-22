<?php
if (WP_ENV !== 'production' && !is_admin()) {
  add_action('pre_option_blog_public', '__return_zero');
}
