<?php
/**
 * @file
 * Great module enabler.
 */

namespace Stanford\JumpstartVPSA\Update;
/**
 *
 */
class Modules extends \AbstractUpdateTask {

  protected $description = "Enable some new modules";

  /**
   * Enable some new modules.
   *
   * @param array $args
   *   Installation arguments.
   */
  public function execute(&$args = array()) {
    // Enable some new modules.
    module_enable(array(
      'always_visible',
      'cbc',
      'chosen',
      'stanford_landing_page',
      'stanford_easy_wysiwyg_css',
      'stanford_person',
      'stanford_gallery',
      'stanford_private_page',
      'stanford_private_page_access',
      'stanford_private_page_administration',
      'stanford_private_page_section',
    ), TRUE);
  }

}
