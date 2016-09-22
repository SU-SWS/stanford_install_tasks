<?php
/**
 * @file
 * Add block classes
 */

namespace Stanford\JumpstartEngineering\Install\Block;
/**
 *
 */
class JSEBlockClasses extends \AbstractInstallTask {

  /**
   * Set Block Classes.
   *
   * @param array $args
   *   Installation arguments.
   */
  public function execute(&$args = array()) {

    // Install default JSE block classes.
    $values = array(
      array("bean", "jumpstart-large-custom-block", "well span8"),
      array("bean", "jumpstart-small-custom-block-2", "well span4"),
      array("bean", "jumpstart-small-custom-block-3", "well span4"),
      array("bean", "jumpstart-small-custom-block-4", "well span4"),
      array("bean", "jumpstart-small-custom-block-5", "well span4"),

    );
    foreach ($values as $k => $value) {
      // UPDATE block SET (module="bean",delta="social-media",css_class="span4") WHERE module="bean" AND delta="social-media"
      $update = db_update('block')->fields(array('css_class' => $value[2]));
      $update->condition('module',$value[0]);
      $update->condition('delta',$value[1]);
      $update->execute();
    }
  }
  /**
   *
   */
  public function requirements() {
    return array(
      'block_class',
    );
  }

}
