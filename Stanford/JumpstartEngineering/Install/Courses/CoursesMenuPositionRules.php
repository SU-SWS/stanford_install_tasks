<?php
/**
 * @file
 * Create JSE Menu Position rules.
 */

namespace Stanford\JumpstartEngineering\Install\Courses;
/**
 *
 */
class CoursesMenuPositionRules extends \AbstractInstallTask {

  /**
   * Create Menu Position rules.
   *
   * @param array $args
   *   Installation arguments.
   */
  public function execute(&$args = array()) {

    # Set menu position default setting to 'mark the rule's parent menu item as being "active".'
    variable_set('menu_position_active_link_display', 'parent');

    // Define the rules.
    $rules = array();
    $rules[] = array(
      'link_title' => 'Courses',
      'admin_title' => 'Courses by content type',
      'conditions' => array(
        'content_type' => array(
          'content_type' => array(
            'stanford_course' => 'stanford_course',
          ),
        ),
      ),
    );
    $rules[] = array(
      'link_title' => 'Courses',
      'admin_title' => 'Courses by path',
      'conditions' => array(
        'pages' => array(
          'pages' => 'courses/*',
        ),
      ),
    );

    foreach ($rules as $mp_rule) {
      $rule = new \Stanford\Utility\Install\InsertMenuRule();
      $rule->insert_menu_rule($mp_rule);
    }

  }

}
