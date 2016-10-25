<?php
/**
 * @file
 * Add block classes
 */

namespace Stanford\JumpstartEngineering\Install\Courses;
/**
 *
 */
class CoursesBlockClasses extends \AbstractInstallTask {

  /**
   * Set Block Classes.
   *
   * @param array $args
   *   Installation arguments.
   */
  public function execute(&$args = array()) {

    // Install default Courses block classes.
    $values = array(
      array("views","-exp-courses-search_page","well")
    );

    foreach ($values as $k => $value) {
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
