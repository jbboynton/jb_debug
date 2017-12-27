<?php

namespace JB\DBG;

use JB\DBG\Constants;

class Debugger {

  public function __construct() {}

  function pp($data) {
    $data = $this->fix_whitespace($data);
    $template = Constants::$DEBUG_PANE_TEMPLATE_PATH;

    ob_start();
    include $template;
    $output = ob_get_contents();
    ob_end_clean();

    echo $output;
  }

  private function fix_whitespace($text) {
    if (is_array($text)) {
      $text = $this->build_formatted_array($text);
    }

    return $text;
  }

  private function build_formatted_array($text_array) {
    $stringified_array = print_r($text_array, true);
    $formatted_string = str_replace("  ", " ", $stringified_array);

    return $formatted_string;
  }

}

