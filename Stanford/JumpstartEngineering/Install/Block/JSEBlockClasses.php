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
    $fields = array('module', 'delta', 'css_class');
    $values = array(
      array("bean", "jumpstart-small-custom-block", "well"),
      array("bean", "jumpstart-large-custom-block", "well"),
    );
    // Key all the values.
    $insert = db_insert('block_class')->fields($fields);
    foreach ($values as $value) {
      $db_values = array_combine($fields, $value);
      $insert->values($db_values);
    }
    $insert->execute();
  }

}
