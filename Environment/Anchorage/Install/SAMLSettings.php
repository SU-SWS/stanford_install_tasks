<?php
/**
 * @file
 * Abstract Task Class.
 */

namespace Environment\Anchorage\Install;
/**
 *
 */
class SAMLSettings extends \AbstractInstallTask {

  /**
   * Set the site name.
   *
   * @param array $args
   *   Installation arguments.
   */
  public function execute(&$args = array()) {
  }

  /**
   * Dependencies.
   */
  public function requirements() {
    return array(
      'stanford_SAML_block', // On environment brach.
    );
  }

}



