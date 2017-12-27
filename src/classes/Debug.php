<?php

namespace JB\DBG;

use JB\DBG\Constants;

class Debug {

  public function __construct() {
    add_action('admin_enqueue_scripts', array($this, 'enqueue_assets'));
  }

  public function enqueue_assets() {
    global $post_type;

    if ($post_type == Constants::$POST_TYPE_NAME) {
      $this->enqueue_css();
    }
  }

  private function enqueue_css() {
    $id = Constants::$ADMIN_CSS_ID;
    $path = plugins_url(Constants::$ADMIN_CSS_PATH);

    wp_register_style($id, $path);
    wp_enqueue_style($id);
  }

}

