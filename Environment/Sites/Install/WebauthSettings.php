<?php
/**
 * @file
 * Abstract Task Class
 */

namespace Environment\Sites\Install;

class WebauthSettings extends \AbstractInstallTask {

  /**
   * Set the site name.
   *
   * @param array $args
   *  Installation arguments.
   */
  public function execute(&$args = array()) {

  }

  /**
   * @param array $tasks
   */
  public function requirements() {
    return array(
      'webauth',
      'webauth_extras',
      'stanford_webauth_block', // on environment branch
    );
  }

}
