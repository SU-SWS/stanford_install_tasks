<?php
/**
 * @file
 * Configure the sitewide layout.
 */

namespace Stanford\JumpstartEngineering\Install\Layouts;
/**
 *
 */
class Sitewide extends \AbstractInstallTask {

  /**
   * Configure the sitewide layout.
   *
   * @param array $args
   *   Installation arguments.
   */
  public function execute(&$args = array()) {


    $context_status = variable_get('context_status', array());
    $context_status['sitewide_jse'] = FALSE;
    $context_status['sitewide_jsa'] = TRUE;
    variable_set('context_status', $context_status);

  }

}