<?php
/**
 * @file
 * Features revert.
 */

namespace Stanford\JumpstartVPSA\Update;
/**
 *
 */
class FeaturesRevert extends \AbstractUpdateTask {

  protected $description = "Revert some Features";

  /**
   * Revert some Features.
   *
   * @param array $args
   *   Installation arguments.
   */
  public function execute(&$args = array()) {
    // Revert a few features...
    features_revert_module("stanford_image");
    features_revert_module("stanford_image_styles");
    features_revert_module("stanford_bean_types");
  }

}
