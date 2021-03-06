<?php
/**
 * @file
 * Abstract Task Class.
 */

namespace Stanford\JumpstartAcademic\Install;
use \ITasks\AbstractInstallTask;

/**
 *
 */
class EnableModules extends AbstractInstallTask {

  /**
   * Set the site name.
   *
   * @param array $args
   *   Installation arguments.
   */
  public function execute(&$args = array()) {
    // This is enabled here because it depends on items that are in
    // other install tasks so it cannot be a dependency or it will get
    // installed too early.
    module_enable(array(
      "stanford_jsa_roles",
    ));
  }

}
